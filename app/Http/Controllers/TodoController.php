<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\SaveRequest;
use App\Http\Requests\Todo\UpdateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::orderBy("id","desc")->paginate();

        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveRequest $request)
    {
        $data = $request->all();

        Todo::create($data);

        return redirect()->route('todo.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::find($id);

        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->all();

        Todo::find($id)->update($data);

        return redirect()->route('todo.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::find($id)->delete();

        return redirect()->route('todo.index')->with('success', 'Task deleted successfully.');
    }
}
