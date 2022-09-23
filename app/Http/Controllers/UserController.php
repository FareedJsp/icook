<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$data = new User;

        $data -> name = $request->name;
        $data -> role = $request->role;
        $data -> email = $request->email;
        $data->save();

        return redirect()->route ('user')->with('success', 'User has been added successfully.');*/
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
        return view('user.edit', compact('user'));
    }


    public function setting($id)
    {
        $user = User::findOrFail($id);
        return view('user.setting', compact('user'));
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
        $data = User::find($id);

        $data -> name = $request->name;
        $data -> role = $request->role;
        $data -> email = $request->email;
        $data->save();

        return redirect()->route ('user')->with('success', 'User role has been Updated successfully.');
    }


    public function updatesetting(Request $request, $id)
    {
        $data = User::find($id);

        $data -> name = $request->name;
        $data -> email = $request->email;
        $data->save();

        //return redirect()->route ('resepi')->with('success', 'User info has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->route ('user')->with('success', 'User has been deleted successfully.');
    }
}
