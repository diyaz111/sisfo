@extends('sb-admin/app')
@section('title', 'Gtk')
@section('gtk', 'active')
@section('main', 'show')
@section('gtk-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Post</h1>

    <form action="/gtk" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            @error('gambar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" value="{{old('role')}}">
            @error('role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/gtk" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection
