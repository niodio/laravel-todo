<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function list()
    {
        // Query Builder
        //$list = DB::select('select * from tarefas');

        // Eloquent ORM
        $list = Tarefa::all();

        return view('tarefas.list', [
            'list' => $list
        ]);
    }


    public function add()
    {
        return view('tarefas.add');
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'titulo' => [
                'required',
                'max:255',
                'string'
            ]
        ]);

        $titulo = $request->input('titulo');

        // Query Builder
        //Insert into DB
        /*DB::insert('insert into tarefas (titulo) values (:titulo)', [
            'titulo' => $titulo
        ]);
        */

        // Eloquent ORM
        $tarefa = new Tarefa();
        $tarefa->titulo = $titulo;
        $tarefa->save();


        return redirect()->route('tarefas.list');
    }

    public function edit($id)
    {
        // Query Builder
        /*$data = DB::select('select * from tarefas where id = :id', [
            'id' => $id
        ]);
        */

        // Eloquent ORM
        $data = Tarefa::find($id);

        if ($data) {
            return view('tarefas.edit', [
                'data' => $data
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

            // Query Builder
            /*$data = DB::select('select * from tarefas where id = :id', [
                'id' => $id
            ]);
            */

            // Eloquent ORM
            $data = Tarefa::find($id);

            if ($data) {
                //Query builder
                /*DB::update('update tarefas set titulo = :titulo, resolvido = :resolvido where id = :id', [
                    'id' => $id,
                    'titulo' => $titulo,
                    'resolvido' => $resolvido
                ]);
                */

                // Eloquent ORM
                $data->titulo = $titulo;
                $data->resolvido = $resolvido;
                $data->save();
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
        // Query Builder
        //Delete from DB
        /*DB::delete('delete from tarefas where id = :id', [
            'id' => $id
        ]);
        */

        // Eloquent ORM
        $data = Tarefa::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('tarefas.list')
            ->with('warning', 'Tarefa deletada.');
    }

    public function done($id)
    {
        // Query Builder
        /*$data = DB::select('select * from tarefas where id = :id', [
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
        */

        //Eloquent ORM
        $data = Tarefa::find($id);

        if ($data) {
            if ($data->resolvido === 1) {
                $data->resolvido = 0;
                $data->save();

                return redirect()->route('tarefas.list')->with('warning', 'Resolvido - marcado  - atualizado para - desmarcar');
            } else {
                $data->resolvido = 1;
                $data->save();

                return redirect()->route('tarefas.list')->with('warning', 'Resolvido - desmarcado - atualizado para - marcado');
            }
        } else {
            return redirect()->route('tarefas.list')->with('warning', 'Tarefa não encontrada');
        }
    }

    public function pesquisar(Request $request)
    {
        $request->validate([
            'pesquisa' => [
                'required',
                'max:255',
                'string'
            ]
        ]);

        $pesquisa = $request->input('pesquisa');

        // Eloquent ORM
        $list = Tarefa::where('titulo', 'like', '%' . $pesquisa . '%')->get();

        return view('tarefas.list', [
            'list' => $list
        ]);
    }
}
