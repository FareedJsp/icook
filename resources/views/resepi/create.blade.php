@extends('layout.main')

@section('title' , 'createresepi')
@section('heading' , 'Create Resepi')
@section('breadcrumb' , 'Create Resepi')

@section('content')

<form method="post" action="/insertresepi" enctype="multipart/form-data">

  @csrf

<div class="container">
  <div class="row">
    <div class="col-6">

      <input type="hidden" name="id_user" value="{{Auth::User()->id}}">

      <h4 class="mb-3">Create Resepi</h4>

      <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-control" name="id_category">
        <option value="">select category</option>
          @foreach (App\Models\Category::get() as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
        </select>
      </div>


        <div class="mb-3">
          <label class="form-label">Judul</label>
          <input type="text" class="form-control" name="judul">
        </div>

        <div class="mb-3">
          <label class="form-label">Resepi</label>
          <textarea class="form-control" rows="3" name="resepi"></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Upload Image</label>
          <input type="file" class="form-control-file" placeholder="url link for the image" name="image">
        </div>

          <button type="submit" class="btn btn-primary btns">Submit</button>

        
    </div>
  </div>
</div>
</form>

@endsection