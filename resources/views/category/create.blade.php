@extends('layout.main')

@section('title' , 'createcategory')
@section('heading' , 'Create Category')
@section('breadcrumb' , 'Create Category')

@section('content')

@php
    $role = Auth::User()->role ?? null
@endphp

    @if ($role == 'admin')

<form method="post" action="/insertcategory">

  @csrf

<div class="container">
  <div class="row">
    <div class="col-6">

      <h4 class="mb-3">Create Category</h4>
      
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" placeholder="name of the category" name="name" required>
        </div>
      
        <button type="submit" class="btn btn-primary btns">Submit</button>

        
    </div>
  </div>
</div>

</form>

@else
    <h3>You're not admin</h3>
@endif

@endsection