<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Post;
use App\Models\Visitor;

use Illuminate\Http\Request;

/**
* Untuk mengakses folder lokal(public/News_Images)
* agar dapat menyimpan, edit, dan hapus gambar.
*/

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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

        $heading = DB::table('news')->where('heading','>','0')
                                    ->get(['id','title','content','image'])
                                    ->last();

        

        return view('news.index',compact('data','heading'));
    }

    /*
    |--------------------------------------------------------------------------
    | Halaman Detail
    |--------------------------------------------------------------------------
    */
    public function detail(Request $request, $id)
    {
        $ip = hash('sha512',$request->ip());

        Visitor::create([
            'ip'   => $ip,
            'date' => today(),
            'news_id' => $request -> id
         ]);

        $data     = News::find($id);

        $all_data = News::all();

        $visitor  = Visitor::where('news_id', $id)->get();


        $no = 1;

        return view('news.detail', compact('data','visitor','all_data', 'no'));
    }

    /*
    |--------------------------------------------------------------------------
    | Tambah Berita
    |--------------------------------------------------------------------------
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
        $image          -> move($destination, $image_name);

        /**
        * Insert ke Database.
        *
        */
        if ($request->heading == 0) {
            News::create([
                'title'     => $request -> title,
                'image'     => $image_name,
                'content'   => $request -> content,
                'heading'   => 0
            ]);
        }
        else {
            News::create([
                'title'     => $request -> title,
                'image'     => $image_name,
                'content'   => $request -> content,
                'heading'   => 1
            ]);
        }

        return redirect('/dashboard/');

    }

    /*
    |--------------------------------------------------------------------------
    | Edit Gambar
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data = News::find($id);
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
        */
            /**
            * Ambil gambar dan hapus.
            *
            */
            $image          = News::where('id',$id) -> first();
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
        $data = News::find($id);
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
    */
    public function delete($id)
    {
        /**
        * Menghapus gambar di public/News_Images/.
        *
        */
        $image          = News::where('id',$id) -> first();
        File::delete('News_Images/'.$image -> image);

        /**
        * Menghapus record di Database.
        *
        */
        News::find($id)->delete();

        return redirect('/dashboard');
    }

}
