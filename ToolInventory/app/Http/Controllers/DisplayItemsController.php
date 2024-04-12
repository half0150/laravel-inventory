<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;



class DisplayItemsController extends Controller
{
    public function index(): View
    {
        $tools = DB::table('tools')->get();

        $category_tools = DB::table('category_tools')->get();

        return view('home', ['tools' => $tools, 'categories' => $category_tools]);
    }
}
