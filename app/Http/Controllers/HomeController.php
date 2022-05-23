<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {

        $total_news = News::select('*')->count();

        $all_data = News::select('*')
                    -> orderBy('id', 'desc')
                    -> get();

        return view('admin.dashboard', compact('all_data', 'total_news'));
    }
}
