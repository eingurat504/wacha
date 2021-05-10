<?php

namespace App\Http\Controllers;

use App\Models\ApplicationLog;
use App\Models\Leave;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    /**
     * Array of Device database fields.
     *
     * @var array
     */
    protected $key_map = [
        'start_date' => 'start',
        'end_date' => 'end',
        'applied_by' => 'user_id',
//        'user' => [
//            'id' => 'id',
//            'name' => 'name',
//        ],
    ];



    /**
     * Show Leave applications
     */
    public function index()
    {
        $this->authorize('viewAny', [Application::class]);

        $applications = Application::with(['user', 'leave'])->get();

        return view('applications.index', [
            'applications' => $applications
        ]);

    }

    /**
     *show Application details
     *
     * @param $applicationId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($applicationId)
    {

        $this->authorize('view', [Application::class, $applicationId]);

        $application = Application::findorfail($applicationId);

        return view('applications.show', [
            'application' => $application
        ]);

    }

    /**
     * Show Edit application
     *
     * @param $applicationId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($applicationId)
    {

        $this->authorize('update', [Application::class, $applicationId]);

        $application = Application::findorfail($applicationId);

        return view('applications.edit', [
            'application' => $application
        ]);

    }


    /**
     * Update Application
     *
     * @param $applicationId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update($applicationId)
    {

        $this->authorize('update', [Application::class, $applicationId]);

        $application = Application::findorfail($applicationId);

        $application->applied_by = Auth::user()->id;
        $application->updated_at = date('Y-m-d H:i:s');
        $application->save();

        flash("{$application->start_date} updated.")->success();

        return redirect()->route('applications.index');
    }

    /**
     * Accept Application
     *
     * @param $applicationId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function accept($applicationId)
    {

        $this->authorize('accept', [Application::class, $applicationId]);

        $application = Application::findOrFail($applicationId);

        return view('applications.accept', [
            'application' => $application
        ]);
    }

    /**
     * Accept Application
     *
     * @param Request $request
     * @param $applicationId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function accepted(Request $request, $applicationId)
    {
        $this->authorize('accept', [Application::class, $applicationId]);

        $application = Application::findOrFail($applicationId);

        $leave = Leave::findOrFail($application->leave_id);

        $this->validate($request, [
            'start_date' => "required|after:{$leave->start_date}",
            'end_date' => "required|different:start_date|after:start_date|before:{$leave->end_date}",
            'description' => 'sometimes|max:255',
        ]);

        $application->status = 1;
        $application->updated_at = date('Y-m-d H:i:s');
        $application->save();

        $log = new ApplicationLog();
        $log->start_date = $application->start_date;
        $log->end_date = $application->end_date;
        $log->status = 1;
        $log->leave_id = $application->leave_id;
        $log->applied_by = Auth::user()->id;
        $log->created_at = date('Y-m-d H:i:s');
        $log->save();

//        $startDate = new \DateTime($leave->date_from);
//        $endDate = new \DateTime($leave->date_to);
//
//        $interval = \DateInterval::createFromDateString('1 day');
//        $period = new \DatePeriod($startDate, $interval, $endDate);
//
//        foreach ($period as $date) {
//
//            $application = new Application();
//            $application->leave_date = $date->format('Y-m-d');
//            $application->status = 0;
//            $application->leave_id = $leave->id;
//            $application->user_id = Auth::user()->id;
//            $application->save();
//
////            echo $date->format(\DateTime::ATOM);
//        }

        flash("{$application->start_date} accepted.")->success();

        return redirect()->route('applications.index');
    }

    /**
     * Show Confirm Application
     *
     * @param $applicationId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function confirm($applicationId)
    {

        $this->authorize('confirm', [Application::class, $applicationId]);

        $application = Application::findOrFail($applicationId);

        return view('applications.confirm', [
            'application' => $application
        ]);
    }

    /**
     * Confirm Application
     *
     * @param $applicationId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function confirmed($applicationId)
    {

        $this->authorize('confirm', [Application::class, $applicationId]);

        $application = Application::findOrFail($applicationId);

        $application->status = 2;
        $application->updated_at = date('Y-m-d H:i:s');
        $application->save();

        $log = new ApplicationLog();
        $log->start_date = $application->start_date;
        $log->end_date = $application->end_date;
        $log->status = 2;
        $log->leave_id = $application->leave_id;
        $log->applied_by = Auth::user()->id;
        $log->created_at = date('Y-m-d H:i:s');
        $log->save();

        flash("{$application->start_date} confirmed.")->success();

        return redirect()->route('applications.index');

    }

    /**
     * Show Approve Application
     *
     * @param $applicationId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function approve($applicationId)
    {

        $this->authorize('approve', [Application::class, $applicationId]);

        $application = Application::findOrFail($applicationId);

        return view('applications.approve', [
            'application' => $application
        ]);
    }

    /**
     * Approve Application
     *
     * @param $applicationId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function approved($applicationId)
    {
        $this->authorize('approve', [Application::class, $applicationId]);

        $application = Application::findOrFail($applicationId);

        $application->status = 3;
        $application->updated_at = date('Y-m-d H:i:s');
        $application->save();

        $log = new ApplicationLog();
        $log->start_date = $application->start_date;
        $log->end_date = $application->end_date;
        $log->status = 3;
        $log->leave_id = $application->leave_id;
        $log->applied_by = Auth::user()->id;
        $log->created_at = date('Y-m-d H:i:s');
        $log->save();

        flash("{$application->start_date} approved.")->success();

        return redirect()->route('applications.index');
    }

    /**
     *
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getApprovedApplications(Request $request)
    {
//
        $applications = Application::query()
            ->select([
                'id',
                'start_date',
                'end_date',
                'applied_by',
            ])
            ->with('user:id,name')
            ->where('applied_by', Auth::user()->id)
            ->where('status', 3)
            ->take($request->input('limit', 1000))
            ->get();
//dd($applications);
//        $applications = Application::with(['user','leave'])->where('applied_by', Auth::user()->id)->where('status', 3)->get();
//dd($applications);
        $applications = $applications->map(function ($application) {
            return  $this->swap_keys($this->key_map, $application);
        });

        return response()->json(["applications" => $applications], 200);

    }

    /**
     * Destroy Application
     *
     * @param $applicationId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($applicationId)
    {

        $this->authorize('delete', [Application::class, $applicationId]);

        $leave = Application::findOrFail($applicationId);

        $leave->delete();

        flash('Application has been deleted.')->error()->important();

        return redirect()->route('applications.index');
    }


    /**
     * Swap assoc array keys.
     *
     * @param  array      $key_map
     * @param  mixed      $sbj
     * @return array|null
     */
    public function swap_keys($key_map, $sbj)
    {
        if (empty($sbj)) {
            return $sbj;
        }

        if ($sbj instanceof \Illuminate\Database\Eloquent\Collection) {
            $sbj = $sbj->toArray();
        } elseif ($sbj instanceof \Illuminate\Database\Eloquent\Model) {
            $sbj = $sbj->toArray();
        }

        if (!is_array($sbj)) {
            // throw new \InvalidArgumentException();
            return $sbj;
        }

        $swapped = [];
        foreach (array_keys($sbj) as $key) {
            if (isset($key_map[$key])) {
                if (is_array($key_map[$key])) {
                    // replace recursively...
                    $swapped[$key] = swap_keys($key_map[$key], $sbj[$key]);
                } else {
                    $swapped[$key_map[$key]] = $sbj[$key];
                }
            } else {
                $swapped[$key] = $sbj[$key];
            }
        }

        return $swapped;
    }

}
