@extends('layout.main')

@section('title' , 'edituser')
@section('heading' , 'Edit UserRole')
@section('breadcrumb' , 'Edit User Role')

@section('content')

@php
    $role = Auth::User()->role ?? null
@endphp

    @if ($role == 'admin')

<form method="post" action="/updateuser/{{$user->id}}" enctype="multipart/form-data">

    @csrf
  
  <div class="container">
    <div class="row">
      <div class="col-6">
  
        <h4 class="mb-3">Update User Role</h4>
  
        <div class="mb-3">
          <label class="form-label">Role</label>

            @php
                $role = $user->role
            @endphp

          <select class="form-control" name="role" value="">
          <option value="admin" {{$role === 'admin' ? 'selected ="selected"' : ''}}>admin</option>
          <option value="user" {{$role === 'user' ? 'selected ="selected"' : ''}}>user</option>
          </select>
        </div>
  
  
          <div class="mb-3">
            <label class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" readonly>
          </div>
  
          <div class="mb-3">
            <label class="form-label">email</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}" readonly>
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