<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->with('roles')->paginate(6);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required',
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        foreach ($request->get('roles') as $role => $id) {
            $user->toggleRole($role);
        }

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $userEdit
     * @return \Illuminate\Http\Response
     */
    public function edit(User $userEdit)
    {
        return view('users.edit', compact('userEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $userEdit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $userEdit)
    {
        if (auth()->user()->hasRole('admin'))
        {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($userEdit->email, 'email')],
                'password' => 'sometimes|nullable|min:6|confirmed',
                'roles' => 'required',
            ]);

            $userEdit->name = $request->get('name');
            $userEdit->email = $request->get('email');
            $request->get('password') ? $userEdit->password = bcrypt($request->get('password')) : '';

            $userEdit->assignRoles(array_keys($request->get('roles')));

            $userEdit->save();

            return redirect(route('usuarios.index'));
        }

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($userEdit->email, 'email')],
            'password' => 'sometimes|nullable|min:6|confirmed',
        ]);

        $userEdit->name = $request->get('name');
        $userEdit->email = $request->get('email');
        $request->get('password') ? $userEdit->password = bcrypt($request->get('password')) : '';

        $userEdit->save();

        return redirect(route('usuarios.edit', auth()->user()->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect(route('usuarios.index'));
    }
}
