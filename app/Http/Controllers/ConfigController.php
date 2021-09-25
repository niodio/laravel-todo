<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request)
    {
        $nome = 'Adelson';
        $idade = '35';

        $data = [
            'nome' => $nome,
            'idade' => $idade,
        ];

        return view('config', $data );
    }

    public function info()
    {
        # code...
        echo "INFO 3";
    }

    public function permissoes()
    {
        # code...
        echo "PERMISSOES 3";
    }
}
