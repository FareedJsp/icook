<?php

namespace App\Http\Controllers;

use App\Models\Resepi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResepiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $id = Auth::User()-> id;
        $role = Auth::User()-> role;

        if($role == 'admin'){
            $resepi = Resepi::get();
            return view('resepi.index', compact('resepi'));
        }
        else{
            $resepi = Resepi::where('id_user' , $id)->get();
            return view('resepi.index', compact('resepi'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resepi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Resepi;

        $data -> id_user = $request->id_user;
        $data -> id_category = $request->id_category;
        $data -> judul = $request->judul;
        $data -> resepi = $request->resepi;

        

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path(). '/resepi_images', $name);
            $image = $name;

        }else{
            $image = $request->image;
        }

        $data -> image = $image;

        $data->save();
        return redirect()->route ('resepi')->with('success', 'category has been created successfully.');
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
        $resepi = Resepi::findOrFail($id);
        return view('resepi.edit', compact('resepi'));
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
        $data = Resepi::findOrFail($id);

        $data -> id_user = $request->id_user;
        $data -> id_category = $request->id_category;
        $data -> judul = $request->judul;
        $data -> resepi = $request->resepi;

        $image = $data->image;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->move(public_path(). '/resepi_images', $name);
            $image = $name;

        }else{
            $image = $data->image;
        }

        $data -> image = $image;

        $data->save();
        return redirect()->route ('resepi')->with('success', 'category has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Resepi::find($id);
        $data->delete();

        return redirect()->route ('resepi')->with('success', 'resepi has been deleted successfully.');
    }
}
