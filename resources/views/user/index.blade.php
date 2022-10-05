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
          <th>Status</th>
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

              @if ($row->status == 'pending')
              <th style="color : grey">pending</th>
              @elseif($row->status == 'approved')
              <th style="color : green">approved</th>
              @elseif($row->status == 'rejected')
              <th style="color : red">rejected</th>
              @endif

              <td>

                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="First group">
                    @if ($row->status != 'approved')
                    <form action="/approval/{{$row->id}}" method="post">
                    @csrf
                    <input type="hidden" value="approved" name="status">
                    <button class="btn btn-success" onclick="return confirm('Are you sure you want to approve this data?')">approve</button>
                    </form>
                    @endif
                    @if($row->status != 'rejected')
                    <form action="/approval/{{$row->id}}" method="post">
                    @csrf
                    <input type="hidden" value="rejected" name="status">
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to approve this data?')">reject</button>
                    </form>
                    @endif
                  </div>

                <a href="/edituser/{{$row->id}}" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="/deleteuser/{{$row->id}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete data')"><i class="fa-solid fa-trash"></i></a>
                
                </div>
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