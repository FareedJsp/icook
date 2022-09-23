@extends('layout.main')

@section('title' , 'editvideo')
@section('heading' , 'Edit Video')
@section('breadcrumb' , 'Edit Video')

@section('content')

<form method="post" action="/updatevideo/{{$video->id}}">

    @csrf
  
  <div class="container">
    <div class="row">
      <div class="col-6">

        <input type="hidden" name="id_user" value="{{Auth::User()->id}}">
  
        <h4 class="mb-2">Update Video Data</h4>
  
        <div class="mb-3">
          <label class="form-label">Resepi</label>
          <select class="form-control" name="id_resepi">
          <option value="{{$video->id}}">{{$video->Resepi->judul}}</option>
            @foreach (App\Models\Resepi::get() as $item)
                 <option value="{{$item->id}}">{{$item->judul}}</option>
            @endforeach
          </select>
        </div>
  
          <div class="mb-3">
            <label class="form-label">Upload Video</label>
            <input type="text" class="form-control" placeholder="url link for the video" name="video" value="{{$video->video}}">
          </div>
  
            <button type="submit" class="btn btn-primary btns">Submit</button>
  
          
      </div>
    </div>
  </div>
  </form>
@endsection