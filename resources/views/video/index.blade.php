@extends('layout.main')

@section('title' , 'video')
@section('heading' , 'Video')
@section('breadcrumb' , 'Video')

@section('content')

<a href="/createvideo" class="btn btn-outline-secondary mb-3">Add Video</a>

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
          <th>resepi</th>
          <th>video</th>
          <th>Action(s)</th>
        </tr>
        </thead>
        <tbody>

          @php
            $no = 1
          @endphp
          
          @foreach ($video as $row)
      
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $row->Resepi->judul ?? null}} </td>
              <td> <x-embed url="{{$row->video}}" aspect-ratio="16:9" /></td>
              <td>
                <a href="/editvideo/{{$row->id}}" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="/deletevideo/{{$row->id}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete data')"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>

          @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

@endsection