<?php

namespace App\Http\Controllers;

use App\Models\ApplicationLog;
use App\Models\Leave;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Shows Leave days
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', [Leave::class]);

        $leaves = Leave::with('createdby')->get();

        return view('leaves.index', [
            'leaves' => $leaves
        ]);

    }

    /**
     *show Leave day
     *
     * @param $leaveId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($leaveId)
    {

        $this->authorize('view', [Leave::class, $leaveId]);

        $leave = Leave::with('createdby')->findorfail($leaveId);

        return view('leaves.show', [
            'leave' => $leave
        ]);

    }

    /**
     * Show Leave roaster
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {

        $this->authorize('create', [Leave::class]);

        return view('leaves.create');

    }

    /**
     * Create Leave roaster
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->authorize('create', [Leave::class]);

        $this->validate($request, [
            'start_date' => 'required|unique:leaves',
            'end_date' => 'sometimes|unique:leaves|different:start_date|after:start_date',
            'description' => 'sometimes|max:255',
        ]);

        $leave = new Leave();
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->status = 0;
        $leave->description = $request->description;
        $leave->created_by = Auth::user()->id;
        $leave->save();

        $period = $request->start_date ." to ". $request->end_date;

        flash("{$period} created.")->success();

        return redirect()->route('leaves.index');

    }

    //

    /**
     *  Show edit leave roaster
     *
     * @param $leaveId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($leaveId)
    {
        $this->authorize('update', [Leave::class, $leaveId]);

        $leave = Leave::findorfail($leaveId);

        return view('leaves.edit', [
            'leave' => $leave
        ]);

    }

    /**
     * Update Leave Roaster
     *
     * @param Request $request
     * @param $leaveId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $leaveId)
    {
        $this->authorize('update', [Leave::class, $leaveId]);

        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'sometimes|different:start_date|after:start_date',
            'description' => 'sometimes|max:255',
        ]);

        $leave = Leave::findOrFail($leaveId);

        $leave->start_date = $request->input('start_date', $leave->start_date);
        $leave->end_date = $request->input('end_date', $leave->end_date);
        $leave->status = 0;
        $leave->description = $request->input('description', $leave->description);
        $leave->created_by = Auth::user()->id;
        $leave->updated_at = date('Y-m-d H:i:s');
        $leave->save();

        $period = $request->start_date ." to ". $request->end_date;

        flash("{$period} updated.")->success();

        return redirect()->route('leaves.index');
    }

    /**
     * Apply for Leave
     *
     * @param $leaveId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function apply($leaveId)
    {

        $this->authorize('apply', [Leave::class, $leaveId]);

        $leave = Leave::findOrFail($leaveId);

        return view('leaves.apply', [
            'leave' => $leave
        ]);
    }


    /**
     * Apply for Leave
     *
     * @param Request $request
     * @param $leaveId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function applied(Request $request, $leaveId)
    {

        $this->authorize('apply', [Leave::class, $leaveId]);

        $leave = Leave::findOrFail($leaveId);

        $this->validate($request, [
            'start_date' => "required|after:{$leave->start_date}",
            'end_date' => "required|different:start_date|after:start_date|before:{$leave->end_date}",
            'description' => 'sometimes|max:255',
        ]);

        $application = new Application();
        $application->start_date = $request->start_date;
        $application->end_date = $request->end_date;
        $application->status = 0;
        $application->description = $request->description;
        $application->leave_id = $leave->id;
        $application->applied_by = Auth::user()->id;
        $application->save();

        $log = new ApplicationLog();
        $log->start_date = $request->start_date;
        $log->end_date = $request->end_date;
        $log->status = 0;
        $log->leave_id = $leave->id;
        $log->applied_by = Auth::user()->id;
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

        flash("{$request->start_date} - {$request->end_date} applied.")->success();

        return redirect()->route('applications.index');

    }


    /**
     * Delete leave roaster
     *
     * @param $leaveId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($leaveId)
    {

        $this->authorize('delete', [Leave::class, $leaveId]);

        $leave = Leave::findOrFail($leaveId);

        $leave->delete();

        flash('Permission has been deleted.')->error()->important();

        return redirect()->route('leaves.index');
    }

}
