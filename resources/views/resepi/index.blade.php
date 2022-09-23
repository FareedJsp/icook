@extends('layout.main')

@section('title' , 'resepi')
@section('heading' , 'Resepi')
@section('breadcrumb' , 'Resepi')

@section('content')

<a href="/createresepi" class="btn btn-outline-secondary mb-3">Add Resepi</a>

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
          <th>category</th>
          <th>judul</th>
          <th>resepi</th>
          <th>image</th>
          <th>Action(s)</th>
        </tr>
        </thead>
        <tbody>

          @php
            $no = 1
          @endphp

          @foreach ($resepi as $row)
      
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $row->Category->name}} </td>
              <td> {{ $row->judul }} </td>
              <td> {{ $row->resepi }} </td>
              <td> <img src="/resepi_images/{{ $row->image }}" alt="" width="120"> </td>
                <td>
                    <a href="/editresepi/{{$row->id}}" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/deleteresepi/{{$row->id}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete data')"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

@endsection