@extends('layout.main')

@section('title' , 'category')
@section('heading' , 'Category')
@section('breadcrumb' , 'Category')

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

<a href="/createcategory" class="btn btn-outline-secondary mb-3">Add Category</a>

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
          <th>Category</th>
          <th>Action(s)</th>
        </tr>
        </thead>
        <tbody>

          @php
              $no = 1
          @endphp

          @foreach ($category as $row)
              
            <tr>
                <td> {{ $no++ }} </td>
                <td> {{ $row->name}} </td>
                <td>
                    <a href="/editcategory/{{$row->id}}" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/deletecategory/{{$row->id}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete data')"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>

          @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  @else
      <h3> You're not admin </h3>
  @endif

@endsection