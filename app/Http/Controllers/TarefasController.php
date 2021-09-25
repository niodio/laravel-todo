<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function list()
    {
        $list = DB::select('select * from tarefas');
        //$list = DB::table('tarefas')->get();

        return view('tarefas.list', ['list' => $list]);
    }


    public function add()
    {
        return view('tarefas.add');
    }

    public function addAction(Request $request)
    {
        if ($request->filled('titulo')) {
            $titulo = $request->input('titulo');

            //Insert into DB
            DB::insert('insert into tarefas (titulo) values (:titulo)', [
                'titulo' => $titulo
            ]);

            return redirect()->route('tarefas.list');
        } else {
            return redirect()->route('tarefas.add')->with('warning', 'Preencha o campo titulo');
        }
    }

    public function edit($id)
    {

        $data = DB::select('select * from tarefas where id = :id', [
            'id' => $id
        ]);

        if (count($data) > 0) {
            return view('tarefas.edit', [
                'data' => $data[0]
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }



    public function editAction(Request $request, $id)
    {
        if ($request->filled('titulo') and $request->filled('resolvido')) {
            $titulo = $request->input('titulo');
            $resolvido = $request->input('resolvido');

            $data = DB::select('select * from tarefas where id = :id', [
                'id' => $id
            ]);

            if (count($data) > 0) {
                DB::update('update tarefas set titulo = :titulo, resolvido = :resolvido where id = :id', [
                    'id' => $id,
                    'titulo' => $titulo,
                    'resolvido' => $resolvido
                ]);
            }

            return redirect()->route('tarefas.list');
        } else {
            return redirect()
                ->route('tarefas.edit', ['id' => $id])
                ->with('warning', 'Campos não podem ficar em branco');
        }
    }

    public function del($id)
    {
        //Delete from DB
        DB::delete('delete from tarefas where id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list')
            ->with('warning', 'Tarefa deletada.');
    }

    public function done($id)
    {

        $data = DB::select('select * from tarefas where id = :id', [
            'id' => $id
        ]);

        if ($data[0]->resolvido === 1) {
            //Update DB into resolvido with 0
            DB::update('update tarefas set resolvido = 0 where id = :id', [
                'id' => $id
            ]);

            return redirect()->route('tarefas.list')->with('warning', 'Resolvido - marcado  - atualizado para - desmarcar');
        } else {
            //Update DB into resolvido with 1
            DB::update('update tarefas set resolvido = 1 where id = :id', [
                'id' => $id
            ]);

            return redirect()->route('tarefas.list')->with('warning', 'Resolvido - desmarcado - atualizado para - marcado');
        }
    }
}
