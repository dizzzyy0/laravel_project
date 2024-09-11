<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $data = ['name' => 'dizzzyy', 'role' => 'Creator'];
        return view('welcome', $data);
    }

    public function about()
    {
        $data = ['name' => 'dizzzyy', 'role' => 'Student', 'description' => 'About me: my name is dizzzyy and i`m still alive (maybe)'];
        return view('about', $data);
    }

    public function contact()
    {
        $data = ['email' => 'deniszerdeckij3@gmail.com', 'phone' => '+380987160338'];
        return view('contact', $data);
    }

    public function hobbies(){
        $data = ['name' => 'dizzzyy and my hobbies:','hobby' => 'my hobby maybe it`s reading and watching anime or serials'];
        return view('hobbies', $data);
    }
}
