@extends('layout.main')

@section('title' , 'setting')
@section('heading' , 'Setting')
@section('breadcrumb' , 'Setting')

@section('content')

<form method="post" action="/updatesetting/{{$user->id}}" enctype="multipart/form-data">

    @csrf
  
  <div class="container">
    <div class="row">
      <div class="col-6">
  
          <div class="mb-3">
            <label class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
          </div>
  
          <div class="mb-3">
            <label class="form-label">email</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
          </div>
  
            <button type="submit" class="btn btn-primary btns">Submit</button>
  
          
      </div>
    </div>
  </div>
  </form>
    
@endsection