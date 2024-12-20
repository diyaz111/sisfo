<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Gtk;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class GtkController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = $this->footer;

        $search = '';
        if (request()->search) {
            $post = Gtk::select('id', 'nama', 'gambar', 'role')->latest()->paginate(10);
            $search = request()->search;

            if (count($post) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $post = Gtk::select('id', 'nama', 'gambar', 'role')->latest()->paginate(10);
        }

        return view('admin/gtk/index', compact('post', 'footer', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/gtk/create', compact('footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png',
            'role' => 'required',
        ]);

        $sampul = time() .'-' .$request->gambar->getClientOriginalName();
        $request->gambar->move('upload/gtk', $sampul);

        Gtk::create([
            'gambar' => $sampul,
            'nama' => $request->nama,
            'role' => $request->role,
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/gtk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = $this->footer;
        $post = Gtk::select('id', 'gambar', 'nama', 'role', 'created_at')->firstOrFail();
        return view('admin/gtk/show', compact('post', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $footer = $this->footer;
        $post = Gtk::select('id', 'gambar', 'nama', 'role', 'created_at')->firstOrFail();
        return view('admin/gtk/edit', compact('post', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png',
            'role' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'role' => $request->role,
        ];

        $post = Gtk::select('gambar', 'id')->whereId($id)->first();
        if ($request->gambar) {
            File::delete('upload/post/' .$post->sampul);

            $sampul = time() . '-' . $request->gambar->getClientOriginalName();
            $request->gambar->move('upload/gtk', $sampul);

            $data['gambar'] = $sampul;
        }

        $post->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/gtk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/gtk/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/gtk');
    }

    public function delete($id)
    {
        $post = Gtk::select('gambar', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/gtk/' . $post->gambar);
        $post->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/gtk');
    }
}
