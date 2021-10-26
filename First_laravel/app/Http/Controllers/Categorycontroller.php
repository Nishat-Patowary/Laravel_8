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
        
        ]);
    }
}
