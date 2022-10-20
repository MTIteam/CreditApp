<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeFormController extends Controller
{
    /** index page */
    public function index() 
    {
        return view('form.forminput');
    }
}
