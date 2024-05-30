<?php

namespace App\Http\Controllers;

use App\Models\todoList;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class todoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $todo = todoList::where('user_id', auth()->user()->id)->get();
        return view('todo.index', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'dateline' => 'required'
        ]);

        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;

            todoList::create($data);

            // dd($product);
            return redirect()->back()->with('success', 'To Do List add successfully');

        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add To Do List');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $todo = todoList::findOrFail($id);

        try {
            //code...
            $todo->update([
                'status' => $request->status
            ]);
            return redirect()->back()->with('success', 'To do status has change, KEEP SPIRIT!!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'To do status has change, DONT GIVE UP!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $todo = todoList::find($id);

        $todo->delete();

        return redirect()->back()->with('success', 'Todo has complete');
    }
}
