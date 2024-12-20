@extends('sb-admin/app')
@section('title', 'Gtk')
@section('gtk', 'active')
@section('gtk', 'show')
@section('gtk-active', 'active')

@section('content')
    <a href="/gtk/{{$post->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/gtk" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/gtk/{{$post->gambar}}" height="450px" class="card-img-top" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{$post->nama}}</h2>
            <p class="card-text">{!!$post->role!!}</p>
        <p class="card-text"><small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection
