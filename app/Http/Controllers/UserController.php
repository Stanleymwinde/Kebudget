<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function about()
    {
        return view('user.about');
    }
    public function service()
    {
        return view('user.services');
    }
    public function blog()
    {
        return view('user.blog');
    }
    public function single()
    {
        return view('user.single-blog');
    }
    public function projects()
    {
        return view('user.project');
    }
    public function details()
    {
        return view('user.project_details');
    }
    public function contact()
    {
        return view('user.contact');
    }
}
