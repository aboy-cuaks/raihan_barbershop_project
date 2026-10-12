<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('guest.index');
    }

    public function about(): View
    {
        return view('guest.about');
    }

    public function services(): View
    {
        return view('guest.services');
    }

    public function portfolio(): View
    {
        return view('guest.portfolio');
    }

    public function blog(): View
    {
        return view('guest.blog');
    }

    public function blogDetails(): View
    {
        return view('guest.blog_details');
    }

    public function contact(): View
    {
        return view('guest.contact');
    }

    public function elements(): View
    {
        return view('guest.elements');
    }
}
