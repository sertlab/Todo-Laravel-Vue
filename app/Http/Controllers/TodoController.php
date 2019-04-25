<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Resources\TodoCollection;

class TodoController extends Controller
{
    public function store(Request $request)
    {
      $todo = new Todo([
        'title' => $request->get('title'),
        'body' => $request->get('body')
      ]);

      $todo->save();
       
      return response()->json('success');
    }

    public function index()
    {
      // dd('paok');
      $todos = Todo::get()->all();
      return response()->json($todos);
      // return new TodoCollection(Todo::all());
    }

    public function edit($id)
    {
      $todo = Todo::find($id);
      return response()->json($todo);
    }

    public function update($id, Request $request)
    {
      $todo = Todo::find($id);

      $todo->update($request->all());

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $todo = Todo::find($id);

      $todo->delete();

      return response()->json('successfully deleted');
    }
}
