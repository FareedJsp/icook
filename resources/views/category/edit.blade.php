@extends('layout.main')

@section('title' , 'editcategory')
@section('heading' , 'Edit Category')
@section('breadcrumb' , 'Edit Category')

@section('content')

@php
    $role = Auth::User()->role ?? null
@endphp

    @if ($role == 'admin')

<form method="post" action="/updatecategory/{{$category->id}}">

@csrf

    <div class="container">
        <div class="row">
            <div class="col-4">
                <form>
                    <div class="mb-3">
                      <label class="form-label">Category</label>
                      <input type="text" class="form-control" placeholder="name of the category" value="{{$category->name}}" name='name'>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                
                </form>                
            </div>
        </div>
    </div>
</form>

@else
    <h3>You're not admin</h3>
@endif

@endsection