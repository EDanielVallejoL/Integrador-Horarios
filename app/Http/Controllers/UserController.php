<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show ($id) {
        return 'UserID: ' .$id;
    }

    public function registro ()
    {
        return view('Auth/Register');
    }
}
