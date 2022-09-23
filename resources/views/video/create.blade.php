@extends('layout.main')

@section('title' , 'createvideo')
@section('heading' , 'Create Video')
@section('breadcrumb' , 'Create Video')

@section('content')
<form method="post" action="/insertvideo">

  @csrf

<div class="container">
  <div class="row">
    <div class="col-6">

      <input type="hidden" name="id_user" value="{{Auth::User()->id}}">

        @php
            $id = Auth::User()-> id;
        @endphp

      <h4 class="mb-2">Create Video Data</h4>

      <div class="mb-3">
        <label class="form-label">Resepi</label>
        <select class="form-control" name="id_resepi">
        <option value="">select resepi</option>
          @foreach (App\Models\Resepi::where('id_user' , $id)->get(); as $item)
               <option value="{{$item->id}}">{{$item->judul}}</option>
          @endforeach
        </select>
      </div>

        <div class="mb-3">
          <label class="form-label">Upload Video</label>
          <input type="text" class="form-control" placeholder="url link for the video" name="video">
        </div>

          <button type="submit" class="btn btn-primary btns">Submit</button>

        
    </div>
  </div>
</div>
</form>


@endsection