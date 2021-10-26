<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Categorycontroller extends Controller
{
    public function AllCat(){
        return view('admin.category.index');
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
            'Category_name' => 'required|unique:categories|max:255',
        
        ],
    [
        'category_name.required' => 'Please input category Name',
        'category_name.max' => 'Category less Then 255chars',
    ]);
    }
}
