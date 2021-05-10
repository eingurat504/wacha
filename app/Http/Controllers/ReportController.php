<?php

namespace App\Http\Controllers;


use App\Models\Application;
use App\Models\ApplicationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     *
     * **/
    public function roaster()
    {

//        $leaves = Leave::paginate(10);
//        $report = "SELECT * FROM application_logs WHERE ";

        return view('reports.roaster',[
            'logs' => []
        ]);

    }

    /**
     *
     * *
     * @param Request $request
     * @return \Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function downloadRoaster(Request $request)
    {

        $this->validate($request, [
            'start_date' => "required",
            'end_date' => "required|different:start_date|after:start_date",
            'status' => 'nullable',
            'limit' => 'nullable|integer',
        ]);

        $qry_logs = ApplicationLog::query()
            ->select([
                'start_date',
                'end_date',
                'status',
                'status',
                'applied_by',
                'created_at',
            ])->with('user');

        if (!empty($request->has('status'))) {
            $qry_logs->where('status', 'ilike', "$request->status");
        }
        $logs = $qry_logs->orderBy('created_at')->take($request->input('limit', 1000))->get();

        return view('reports.roaster', [
            'logs' => $logs,
        ]);


    }


}
