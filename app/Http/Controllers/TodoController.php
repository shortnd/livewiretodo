<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('todos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->todos()->create($this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]));

        return redirect(route("todos.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->update($this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'public' => 'required',
        ]));

        return redirect(route('todos.show', $todo));
    }

    /**
     * Update the completed field for todo.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function completed(Request $request, Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        return redirect()->back();
    }

    public function public(Request $request, Todo $todo)
    {
        $todo->public = $todo->public ? 0 : 1;
        $todo->save();

        return redirect()->back();
    }

    public function publicTodos()
    {
        return view('todos.public')->with('todos', Todo::where('public', true)->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todos.index'));
    }
}
