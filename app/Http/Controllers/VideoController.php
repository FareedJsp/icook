<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
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
            $video = Video::get();
            return view('video.index', compact('video'));
        }
        else{
            $video = Video::where('id_user' , $id)->get();
            return view('video.index', compact('video'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Video;

        $data -> id_user = $request->id_user;
        $data -> id_resepi = $request->id_resepi;
        $data -> video = $request->video;

        $data->save();

        return redirect()->route ('video')->with('success', 'category has been created successfully.');
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
        $video = Video::findOrFail($id);
        return view('video.edit', compact('video'));
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
        $data = Video::findOrFail($id);

        $data -> id_user = $request->id_user;
        $data -> id_resepi = $request->id_resepi;
        $data -> video = $request->video;

        $data->save();

        return redirect()->route ('video')->with('success', 'updated has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Video::find($id);
        $data->delete();

        return redirect()->route ('resepi')->with('success', 'video has been deleted successfully.');
    }
}
