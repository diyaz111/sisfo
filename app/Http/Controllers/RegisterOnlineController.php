<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Kategori;
use App\Models\Logo;
use App\Models\RegisterOnline;
use App\Models\Rekomendasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterOnlineController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }

    public function index() {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $home = true;
        $author = User::getAdminPenulis();
        $rekomendasi = Rekomendasi::select('id_post')->latest()->paginate(3);
        return view('kurikulum.index', compact('logo', 'kategori', 'author', 'rekomendasi', 'footer'));
    }

    public function store(Request $request) {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'no_un' => 'required',
            'jenis_kelamin' => 'required',
            'kota' => 'required',
            'agama' => 'required',
            'ttl' => 'required',
        ]);

        $code = self::generateRandomCode();

        $registerOnline = RegisterOnline::create([
            'code_pendaftaran' => $code,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'no_un' => $request->no_un,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kota' => $request->kota,
            'agama' => $request->agama,
            'ttl' => $request->ttl
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Registration successful!',
            'data' => $registerOnline
        ]);
    }

    private function generateRandomCode()
    {
        // Generate an alphanumeric code
        return 'RO-' . strtoupper(Str::random(6)) . '-' . Carbon::now()->format('YmdHis');
    }
}
