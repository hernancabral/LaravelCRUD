<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortBy = 'id';
        $orderBy = 'desc';
        $perPage = 20;
        $q = null;
    
        if ($request->has('orderBy')) $orderBy = $request->query('orderBy');
        if ($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if ($request->has('perPage')) $perPage = $request->query('perPage');
        if ($request->has('q')) $q = $request->query('q');
    
        $opciones = ['nombre' => 'name', 'email' => 'email'];
        $users = User::search($q)->orderBy($sortBy, $orderBy)->paginate($perPage);
        return view('users.index', compact('users', 'orderBy', 'sortBy', 'q', 'perPage', 'users', 'opciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
        // return view('auth.register');
    }

    // // /**
    // //  * Store a newly created resource in storage.
    // //  *
    // //  * @param  \Illuminate\Http\Request  $request
    // //  * @return \Illuminate\Http\Response
    // //  */
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required',
             'email' => 'required|unique:users,email',
             'password' => 'required|confirmed',
         ]);
         $validatedData['password'] = Hash::make($validatedData['password']);
         $user = User::create($validatedData);

         return redirect('/users')->with('success', 'Se guardo el Usuario!');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:users,name,' . $id,
        ]);

        User::whereId($id)->update($validatedData);

        return redirect('/users')->with('success', 'Se actualizo correctamente');
    }

    public function resetview($id)
    {
        $user = User::findOrFail($id);
        return view('users.reset', compact('user'));
    }

    public function reset(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::whereId($id)->update($validatedData);

        return redirect('/users')->with('success', 'Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'Se ha borrado el usuario');
    }
}