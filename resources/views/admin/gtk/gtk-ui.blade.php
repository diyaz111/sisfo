@extends('artikel/template/app')

@isset($home)
@section('title', 'Semua GTK')
@section('gtk', 'active')
@endisset

@section('content')
<h2 class="my-4 text-center">@yield('title')</h2>
<div class="row mt-4">
    @foreach ($artikel as $row)
    <div class="col-md-4 mt-5">
        <div class="card shadow-sm">
            <img src="/upload/gtk/{{$row->gambar}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$row->nama}}</h5>
                <p class="card-text"><small class="text-muted">{{$row->role}}</small></p>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
