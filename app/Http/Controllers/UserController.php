<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate();

            return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles= Role::all();
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Canale $canale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index',$user)->with('success','Se asigno el Rol');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy($id)
    {
    }
    public function password(User $user)
    {
        $roles= Role::all();
        return view('users.password', compact('user','roles'));
    }
    public function passwordUpdate(Request $request, $id) {
        $password=$request->password;
        $confirmpassword=$request->confirmpassword;
        $passwordCount=count(explode(" ", $password));
        if ($password==$confirmpassword) {
            User::where('id',$id)->update(['password'=>Hash::make($request->password)]);
            return redirect()->route('users.index')
            ->with('success', 'Se cambio la contraseña satisfactoriamente');
    } else {

        return redirect()->back()->with('success', 'La contraseña no coincide');
        }


    }
}
