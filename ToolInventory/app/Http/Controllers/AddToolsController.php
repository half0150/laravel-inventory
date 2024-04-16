<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryTool;
use App\Models\Tool;

class AddToolsController extends Controller
{
    public function create()
    {
        $categories = CategoryTool::all();

        return view('home', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tool_name' => 'required|string',
            'category_id' => 'required|exists:category_tools,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tool = new Tool();
        $tool->tool_name = $validatedData['tool_name'];
        $tool->category_id = $validatedData['category_id'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $tool->image = $imageName;
        }

        $tool->save();

        return redirect()->back()->with('success', 'Tool added successfully!');
    }

    public function edit($id)
    {
        $tool = Tool::findOrFail($id);

        $categories = CategoryTool::all();

        return view('edit', compact('tool', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tool_name' => 'required|string',
            'category_id' => 'required|exists:category_tools,id',

        ]);

        $tool = Tool::findOrFail($id);

        $tool->tool_name = $validatedData['tool_name'];
        $tool->category_id = $validatedData['category_id'];

        $tool->save();

        return redirect()->back()->with('success', 'Tool updated successfully!');
    }

    public function destroy($id)
    {
        Tool::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Tool deleted successfully!');
    }
}
