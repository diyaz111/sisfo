@extends('sb-admin/app')
@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <!-- Content Row -->
    <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Post</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_post}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-file fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kategori</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_kategori}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-tag fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Tag</div>
                <div class="row no-gutters align-items-center">
                <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$jumlah_tag}}</div>
                </div>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-tags fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Banner</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_banner}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-image fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Content Row -->

    {{-- post --}}

    <div class="card border-bottom-primary">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Post Hari Ini</h6>
        </div>
        <div class="card-body">
           @if ($post->count() >= 1)
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $row)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img src="/upload/post/{{$row->sampul}}" alt="" width="80px" height="80px"></td>
                            <td>{{$row->judul}}</td>
                            <td>{!! $row->konten !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
                <div class="alert alert-info" role="alert">
               Anda tidak memiliki post terbaru hari ini
                </div>
           @endif
        </div>
    </div>


    {{-- pendaftaran --}}

    <div class="card border-bottom-warning mt-4">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-warning">Pendaftaran Sampai Hari Ini</h6>
        </div>
        <div class="card-body">
           @if ($register->count() >= 1)
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code Pendaftaran</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($register as $row)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$row->code_pendaftaran}}</td>
                            <td>{{$row->fullname}}</td>
                            <td>{{$row->no_hp}}</td>
                            <td>{{$row->alamat}}</td>
                            <td>{{$row->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
                <div class="alert alert-info" role="alert">
               Anda tidak memiliki banner terbaru hari ini
                </div>
           @endif
        </div>
   </div>

    {{-- banner --}}

    <div class="card border-bottom-warning mt-4">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-warning">Banner Hari Ini</h6>
        </div>
        <div class="card-body">
           @if ($banner->count() >= 1)
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $row)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img src="/upload/banner/{{$row->sampul}}" width="80px" height="80px" alt=""></td>
                            <td>{{$row->judul}}</td>
                            <td>{{$row->slug}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
                <div class="alert alert-info" role="alert">
               Anda tidak memiliki banner terbaru hari ini
                </div>
           @endif
        </div>
   </div>
@endsection
