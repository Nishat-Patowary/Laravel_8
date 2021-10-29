<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Categorycontroller extends Controller
{
    public function AllCat(){
       $categories = DB::table('categories')
           ->join('users','categories.user_id','users.id')
           ->select('categories.*','users.name')
           ->latest()->paginate(5);
        //$categories = category::latest()->paginate(5);
       //$categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
            'Category_name' => 'required|unique:categories|max:255',
        
        ],
    [
        'category_name.required' => 'Please input category Name',
        'category_name.max' => 'Category less Then 255chars',
    ]);


    category::insert([
        'category_name' => $request->Category_name,
        'user_id' => Auth::user()->id,
        'created_at' => Carbon::now()
    ]);
    

/*
   $category = new Category;
   $category->category_name = $request->Category_name;
   $category->user_id = Auth::user()->id;
   $category->save();
*/

/*
  $data = array();
  $data['category_name'] = $request->Category_name;
  $data['user_id'] = Auth::user()->id;
  DB::table('categories')->insert($data);
  
*/
   return Redirect()->back()->with('success','Category Inserted Successfully');
   
    }
}
