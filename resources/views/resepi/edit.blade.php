@extends('layout.main')

@section('title' , 'editresepi')
@section('heading' , 'Edit Resepi')
@section('breadcrumb' , 'Edit Resepi')

@section('content')

<form method="post" action="/updateresepi/{{$resepi->id}}" enctype="multipart/form-data">

    @csrf
  
  <div class="container">
    <div class="row">
      <div class="col-6">

        <input type="hidden" name="id_user" value="{{Auth::User()->id}}">
  
        <h4 class="mb-3">Update Resepi</h4>
  
        <div class="mb-3">
          <label class="form-label">Resepi</label>
          <select class="form-control" name="id_category">
          <option value="{{$resepi->id}}">{{ $resepi->Category->name}}</option>
            @foreach (App\Models\Category::get() as $item)
                 <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
          </select>
        </div>
  
  
          <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" value="{{$resepi->Judul}}">
          </div>
  
          <div class="mb-3">
            <label class="form-label">Resepi</label>
            <textarea class="form-control" rows="3" name="resepi" value="{{$resepi->resepi}}"></textarea>
          </div>
  
          <div class="mb-3">
            <label class="form-label">Upload Image</label>
            <input type="file" class="form-control-file" placeholder="url link for the image" name="image" value="{{$resepi->image}}">
          </div>
  
            <button type="submit" class="btn btn-primary btns">Submit</button>
  
          
      </div>
    </div>
  </div>
  </form>
    
@endsection