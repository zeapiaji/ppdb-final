<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
* Untuk mengakses folder lokal(public/News_Images)
* agar dapat menyimpan, edit, dan hapus gambar.
*/
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Halaman Dashboard
    |--------------------------------------------------------------------------
    */
    public function index(){
        $data = DB::table('news')
                ->orderByRaw('id DESC')
                ->paginate(8);

        return view('news.index',['data' => $data]);
    }

    /*
    |--------------------------------------------------------------------------
    | Halaman Dashboard
    |--------------------------------------------------------------------------
    */
    public function detail($id){
        $data = NewsModel::find($id);

        return view('news.detail',['data' => $data]);
    }


    /*
    |--------------------------------------------------------------------------
    | Tambah Berita
    |--------------------------------------------------------------------------
    | Method yang dipakai untuk memasukan/membuat data ke Database dan Lokal.
    | Ada dua method yaitu method add() dan method store().
    | Method add() dipakai untuk menampilkan halaman untuk menambahkan berita.
    | Method store() dipakai untuk memasukan/membuat data dan disimpan di
    | Database dan Lokal(untuk gambar disimpan di folder public/News_Images).
    |
    */
    public function add(){
        return view('admin.add');
    }

    public function store(Request $request)
    {
        /**
        * Validasi form.
        *
        */
        $this->validate($request,[
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'required|file|image|mimes:jpeg,png,jpg|max:5000'
        ]);

        /**
        * Menambahkan gambar berita.
        *
        */
        $image          = $request->file('image');
        $image_name     = time().'-'.$image->getClientOriginalName();
        $destination    = 'News_Images';
        $image -> move($destination, $image_name);

        /**
        * Insert ke Database.
        *
        */
        NewsModel::create([
            'title'     => $request -> title,
            'image'     => $image_name,
            'content'   => $request -> content,
            'visitors'  => '0',
        ]);

        return redirect('/dashboard/');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Gambar
    |--------------------------------------------------------------------------
    | Method yang dipakai untuk mengedit & update data dari Database dan Lokal.
    | Ada dua method yaitu method edit() dan method update().
    | Method edit() dipakai untuk menampilkan halaman untuk edit berita.
    | Method update() dipakai untuk mengupdate data yang dipilih dan disimpan
    | di Database dan Lokal(untuk gambar disimpan di folder public/News_Images).
    |
    */
    public function edit($id)
    {
        $data = NewsModel::find($id);
        return view('admin.edit', ['data' => $data]);
    }

    public function update($id, Request $request)
    {
        /**
        * Validasi form.
        *
        */
        $this->validate($request,[
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'required|file|image|mimes:jpeg,png,jpg|max:5000'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Gambar
        |--------------------------------------------------------------------------
        | Dalam menghapus gambar ada dua langkah yaitu:
        | 1. Ambil data dari terlebih dahulu dari database lalu cocokan dengan
        | yang ada di lokal, Setelah dicocokan maka gambar dihapus.
        | 2. Setelah gambar terhapus lalu tambahkan gambar yang telah diinputkan oleh
        | admin dan disimpan di lokal.
        |
        */
            /**
            * Ambil gambar dan hapus.
            *
            */
            $image          = NewsModel::where('id',$id) -> first();
            File::delete('News_Images/'.$image->image);

            /**
            * Insert gambar baru ke local.
            *
            */
            $image          = $request->file('image');
            $image_name     = time().'-'.$image->getClientOriginalName();
            $destination    = 'News_Images';
            $image -> move($destination, $image_name);

        /**
        * Update ke Database.
        *
        */
        $data = NewsModel::find($id);
        $data -> title   = $request -> title;
        $data -> content = $request -> content;
        $data -> image   = $image_name;
        $data -> save();
        return redirect('/dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | Hapus Berita
    |--------------------------------------------------------------------------
    | Method yang dipakai untuk menghapus data dari Database dan Lokal.
    | Ada dua objek yang akan dihapus:
    | 1. Menghapus gambar di lokal.
    | 2. Menghapus record di Database.
    |
    */
    public function delete($id)
    {
        /**
        * Menghapus gambar di public/News_Images/.
        *
        */
        $image          = NewsModel::where('id',$id) -> first();
        File::delete('News_Images/'.$image -> image);

        /**
        * Menghapus record di Database.
        *
        */
        NewsModel::find($id)->delete();

        return redirect('/dashboard');
    }

}
