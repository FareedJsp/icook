@extends('layout.main')

@section('title' , 'user')
@section('heading' , 'User')
@section('breadcrumb' , 'User')

@section('content')


@php
    $role = Auth::User()->role ?? null
@endphp

    @if ($role == 'admin')

@if ($message = Session::get('success'))
<div class="alert alert-success">
      <p>{{ $message }}</p>
</div>
    
@endif

<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
          <th>Action(s)</th>
        </tr>
        </thead>
        <tbody>

          @php
            $no = 1
          @endphp
          
          @foreach ($user as $row)
      
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $row->name}} </td>
              <td> {{ $row->role}} </td>
              <td> {{ $row->email}} </td>
              <td>
                <a href="/edituser/{{$row->id}}" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="/deleteuser/{{$row->id}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete data')"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>

          @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  @else
    <h3>You're not admin</h3>
  @endif

@endsection