<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display leave types
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('viewAny', [LeaveType::class]);

        $leave_types = LeaveType::with('createdby')->get();

        return view('leaves.types.index', [
            'leave_types' => $leave_types
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', [LeaveType::class]);

        return view('leaves.types.create');
    }

    /**
     * Store a leave type.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->authorize('create', [LeaveType::class]);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|max:255',
        ]);

        $leave = new Leave();
        $leave->name = $request->name;
        $leave->status = 0;
        $leave->description = $request->description;
        $leave->created_by = Auth::user()->id;
        $leave->save();

    }

    /**
     * Show Leave Type.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function show($leaveTypeId)
    {

        $leave_type = LeaveType::with('createdby')->findorfail($leaveTypeId);

        return view('leaves.types.show', [
            'leave_type' => $leave_type
        ]);
    }

    /**
     * Edit leave type.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function edit($leaveTypeId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $leaveTypeId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveType $leaveType)
    {
        //
    }
}
