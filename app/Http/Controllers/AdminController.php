<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // Mengembalikan view admin/dashboard.blade.php
    }

    public function news()
    {
        return view('admin.news.home'); // Mengembalikan view admin/news.blade.php
    }

    public function create()
    {
        return view('admin.news.create'); // Mengembalikan view admin/news.blade.php
    }
}