<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * index
     */
    public function index(){

        $this->authorize('viewAny', [Permission::class]);

        $permissions = Permission::paginate(10);

        return view('permissions.index', [
            'permissions' => $permissions
        ]);

    }

    /**
     * Display the specified permission.
     *
     * @param int $permissionId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\View\View
     */
    public function show($permissionId)
    {
        $this->authorize('view', [Permission::class, $permissionId]);

        $permission = Permission::findOrFail($permissionId);

        return view('permissions.show', [
            'permission' => $permission,
        ]);
    }


    /**
     *
     *
     *
     *
     * */
    public function create(){


        $this->authorize('create', [Permission::class]);

        return view('permissions.create');

    }

    /**
     *
     *
     * *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){


        $this->authorize('create', [Permission::class]);

        $this->validate($request, [
            'name' => 'required|max:25',
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        flash("{$permission->name} registered.")->success();

        return redirect()->route('permissions.index');

    }

    /**
     * Show the form for editing the specified permission.
     *
     * @param int $permissionId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\View\View
     */
    public function edit($permissionId)
    {
        $this->authorize('update', [Permission::class, $permissionId]);

        $permission = Permission::findOrFail($permissionId);

        return view('permissions.edit', [
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified permission in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $permissionId
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $permissionId)
    {
        $this->authorize('update', [Permission::class, $permissionId]);

        $permission = Permission::findOrFail($permissionId);

        $this->validate($request, [
            'name' => 'sometimes|max:25',
        ]);

        $permission->name = $request->name;
        $permission->save();

        flash("{$request->name} updated.")->success();

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified permission from storage.
     *
     * @param int $permissionId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($permissionId)
    {
        $this->authorize('delete', [Permission::class, $permissionId]);

        $permission = Permission::findOrFail($permissionId);

        $permission->delete();

        flash('Permission has been deleted.')->error()->important();

        return redirect()->route('permissions.index');
    }

}
