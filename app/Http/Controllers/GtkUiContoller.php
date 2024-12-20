<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Gtk;
use App\Models\Kategori;
use App\Models\Logo;
use Illuminate\Http\Request;

class GtkUiContoller extends Controller
{

    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }

    public function index()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();

        request()->session()->forget('search');
        if (request()->search) {
            $artikel = Gtk::select('gambar', 'nama', 'role', 'created_at')->where('nama', 'LIKE', '%' . request()->search . '%')->latest()->paginate(6);
            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Gtk yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $artikel = Gtk::select('gambar', 'nama', 'role', 'created_at')->latest()->paginate(6);
            $search = '';
        }
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        return view('admin.gtk.gtk-ui', compact('artikel', 'logo', 'footer', 'search', 'kategori'));
    }

    public function visimisi()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        return view('visimisi', compact('logo', 'footer', 'kategori'));
    }

    public function sarana()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        return view('saranaprasarana', compact('logo', 'footer', 'kategori'));
    }

    public function struktur()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        return view('struktur', compact('logo', 'footer', 'kategori'));
    }

    public function ekstakurikuler()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        return view('ekstakurikuler', compact('logo', 'footer', 'kategori'));
    }

}
