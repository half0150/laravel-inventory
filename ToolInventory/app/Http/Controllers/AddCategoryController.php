<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryTool;
use Illuminate\Http\RedirectResponse;

class AddCategoryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'category' => 'required|string|max:255|unique:category_tools',
        ]);

        CategoryTool::create([
            'category' => $validatedData['category'],
        ]);

        return redirect()->route('home')->with('success', 'Category created successfully.');
    }
}
