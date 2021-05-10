<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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

    //
    public function index(){

        $this->authorize('viewAny', [User::class]);

        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users
        ]);

    }

    /**
     * Show the form for creating a new user.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', [User::class]);

        $roles = Role::all();

        return view('users.create',[
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', [User::class]);
//        dd($request->roles);
        $this->validate($request, [
            'name' => 'required|max:25',
            // 'alias' => 'required|unique:users,alias',
            'email' => 'required|unique:users,email',
            'roles' => 'required|exists:roles,id',
//            'roles.*' => 'required|array',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
//        $user->assignRole([$request->roles]);
        $user->password = Hash::make(Str::random(10));
        $user->save();

        flash("{$user->name} registered.")->success();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified user.
     *
     * @param int $userId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\View\View
     */
    public function show($userId)
    {
        $this->authorize('view', [User::class, $userId]);

        $user = User::findOrFail($userId);

        return view('users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $userId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\View\View
     */
    public function edit($userId)
    {
        $this->authorize('update', [User::class, $userId]);

        $user = User::findOrFail($userId);

        $roles = Role::all();

        return view('users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $userId
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $userId)
    {
        $this->authorize('update', [User::class, $userId]);

        $user = User::findOrFail($userId);

        $this->validate($request, [
            'name' => 'sometimes|max:25',
            // 'alias' => "sometimes|unique:users,alias,{$userId},id",
            'email' => "sometimes|unique:users,email,{$userId},id",
            'roles' => 'required|exists:roles,id',
//            'roles.*' => 'required|array',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->assignRole([$request->roles]);
        $user->save();

        flash("{$request->name} updated.")->success();

        return redirect()->route('users.index');
    }

    /**
     * Update the specified user in storage.
     *
     * @param mixed $userId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function showProfile($userId)
    {

        $user = User::findOrFail($userId);

        $roles = Role::all();

        return view('users.profile', [
            'user' => $user,
            'roles' => $roles
        ]);

    }

    /**
     * Update the specified user in storage.
     *
     * @param Request $request
     * @param mixed $userId
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateProfile(Request $request, $userId)
    {

        $user = User::findOrFail($userId);

        $this->validate($request, [
            'current_password' => 'required_with:new_password',
            'new_password' => 'sometimes|min:8|confirmed',
        ]);

//        if ($request->filled('new_password')) {
//            if (strcasecmp($user->password, md5($request->current_password)) != 0) {
//                return response()->json(['error' => ['current_password' => ['Incorrect password']]], 422);
//            }
//        }

        if ($request->filled('new_password')) {
            $user->password = md5($request->new_password);
        }

        flash("{$request->name} updated.")->success();

        return redirect()->route('users.index');

    }

    /**
     * Remove the specified user from storage.
     *
     * @param int $userId
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($userId)
    {
        $this->authorize('forceDelete', [User::class, $userId]);

        $user = User::findOrFail($userId);

        $user->forceDelete();

        flash('User has been deleted.')->error()->important();

        return redirect()->route('users.index');
    }


}
