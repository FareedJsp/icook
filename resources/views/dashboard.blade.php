@extends('layout.main')
@section('title' , 'dashboard')
@section('heading' , 'Dashboard')
@section('breadcrumb' , 'Dashboard')
@section('content')

<p class="initialism">Welcome {{Auth::User()->name ?? null}}</p>

@if ($message = Session::get('success'))
<div class="alert alert-success">
      <p>{{ $message }}</p>
</div>
    
@endif


        @php
            $role = Auth::User()->role ?? null
        @endphp
           
        @if ($role == 'admin')

<div class="row">
    <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
        
              <h3 class="card-title font-weight-bold text-secondary">Category</h3>
            
              <p class="card-text text-danger">
                {{App\Models\Category::count()}} Category
              </p>
        
              <a href="/category" class="card-link">Category</a>
        
            </div>
          </div>
    </div>

    <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
        
              <h3 class="card-title font-weight-bold text-secondary">Resepi</h3>
            
              <p class="card-text text-danger">
                {{App\Models\Resepi::count()}} Resepi
              </p>
        
              <a href="/resepi" class="card-link">Resepi</a>
        
            </div>
          </div>
    </div>

    <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
        
              <h3 class="card-title font-weight-bold text-secondary">Video</h3>
            
              <p class="card-text text-danger">
                {{App\Models\Video::count()}} Video
              </p>
        
              <a href="/video" class="card-link">Video</a>
        
            </div>
          </div>
    </div>

    <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
        
              <h3 class="card-title font-weight-bold text-secondary">User</h3>
            
              <p class="card-text text-danger">
                {{App\Models\User::count()}} User
              </p>
        
              <a href="/user" class="card-link">User</a>
        
            </div>
          </div>
    </div>
</div>

    @else
    
<div class="row">
    <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
        
              <h3 class="card-title font-weight-bold text-secondary">Resepi</h3>
            
              <p class="card-text text-danger">
                {{App\Models\Resepi::count()}} Resepi
              </p>
        
              <a href="/resepi" class="card-link">Resepi</a>
        
            </div>
          </div>
    </div>

    <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
        
              <h3 class="card-title font-weight-bold text-secondary">Video</h3>
            
              <p class="card-text text-danger">
                {{App\Models\Video::count()}} Video
              </p>
        
              <a href="/video" class="card-link">Video</a>
        
            </div>
          </div>
    </div>
</div>

@endif

@endsection