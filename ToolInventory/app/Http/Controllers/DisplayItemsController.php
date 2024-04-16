<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Tool;
use App\Models\CategoryTool;

class DisplayItemsController extends Controller
{
    public function index(): View
    {
        $tools = Tool::with('categoryTool')->get();

        $category_tools = CategoryTool::all();

        return view('home', ['tools' => $tools, 'categories' => $category_tools]);
    }
}
