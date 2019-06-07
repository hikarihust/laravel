<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $pathViewController = 'admin.category.';
    // public function show($id)
    // {
    //     return view('user.profile', ['user' => User::findOrFail($id)]);
    // }

    public function index()
    {
        return view($this->pathViewController . 'index');
    }
 
    public function form()
    {
        return view($this->pathViewController . 'form');
    }

    public function delete()
    {
        return "CategoryController - delete";
    }
}