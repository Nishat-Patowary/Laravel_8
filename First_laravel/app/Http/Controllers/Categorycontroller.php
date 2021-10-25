<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Categorycontroller extends Controller
{
    public function AllCat(){
        return view('admin.category.index');
    }
}
