<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveTypeController extends Controller
{
    /**
     * Display leave types
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', [LeaveType::class]);

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

        $leaveType = new LeaveType();
        $leaveType->name = $request->name;
        $leaveType->status = 0;
        $leaveType->description = $request->description;
        $leaveType->created_by = Auth::user()->id;
        $leaveType->save();

        flash($leave_type->name. ' created successfully.')->important();

        return redirect()->route('leave_types.index');

    }

    /**
     * Show Leave Type.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function show($leaveTypeId)
    {

        $leave_type = LeaveType::with('createdby')
                        ->findorfail($leaveTypeId);

        return view('leaves.types.show', [
            'leave_type' => $leave_type
        ]);
    }

        /**
     *  Show edit leave type
     *
     * @param $leaveTypeId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($leaveTypeId)
    {
        $this->authorize('update', [LeaveType::class, $leaveTypeId]);

        $leave_type = LeaveType::findorfail($leaveTypeId);

        return view('leaves.types.edit', [
            'leave_type' => $leave_type
        ]);

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

        $this->authorize('update', [LeaveType::class, $leaveTypeId]);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|max:255',
        ]);

        $leave_type = LeaveType::findOrFail($leaveTypeId);

        $leave_type->name = $request->input('name', $leave_type->name);
        $leave_type->status = 0;
        $leave_type->description = $request->input('description', $leave_type->description);
        $leave_type->created_by = Auth::user()->id;
        $leave_type->updated_at = date('Y-m-d H:i:s');
        $leave_type->save();

        flash($leave_type->name. ' Updated successfully.')->important();

        return redirect()->route('leave_types.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveType $leaveTypeId)
    {
        $this->authorize('delete', [LeaveType::class, $leaveTypeId]);

        $leave = LeaveType::findOrFail($leaveId);

        $leave->delete();

        flash('Permission has been deleted.')->error()->important();

        return redirect()->route('leaves.index');
    }
}
