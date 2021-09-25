<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tarefa;

class HomeController extends Controller
{

    public function index()
    {
        $list = Tarefa::all();

        print_r('<pre>' . $list . '</pre>');
        // return view('welcome');
    }

    public function ___invoke()
    {

        // return view('welcome');
    }
}
