@extends('layout.main')

@section('content')

hello

@php
    $test = 'test'
@endphp

 {{$test}}

 <br>

            @php
                $no = 1
            @endphp

            @foreach (App\Models\Resepi::get() as $row)

                {{ $row->Resepi->name ?? null }} 
                {{ $row->judul }} 

            @endforeach




@endsection
