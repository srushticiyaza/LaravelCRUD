<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\demo;


class democontroller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $crud = demo::where(function ($query) use ($search) {
            $query->where('city', 'like', '%' . $search . '%')
                ->orWhere('state', 'like', '%' . $search . '%');
        });
        $crud = $crud->paginate(5);

        return view('demo.index', ['demo' => $crud]);
    }


    public function create()
    {
        return view('demo.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|max:255',
            'state' => 'required',
        ]);

        demo::create($request->all());

        return redirect()->route('demo.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $demo = demo::where('id', $id)->first();
        return view('demo.edit', ['demo' => $demo]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'city' => 'required',
            'state' => 'required'
        ]);
        $demo = demo::where('id', $id)->first();

        $demo->city = $request->city;
        $demo->state = $request->state;
        $demo->save();

        if ($demo) {
            return redirect()->route('demo.index');
        } else {
            echo "<h1>Data Not Updated.<h1/>";
        }
    }


    public function destroy($id)
    {
        $demo = demo::find($id);

        if (!$demo) {
            return redirect()->route('demo.index')->with('error', 'Data not found.');
        }

        $demo->delete();

        return redirect()->route('demo.index')->with('success', 'Data deleted successfully.');
    }

    public function show($id)
    {
        $demo = demo::where('id', $id)->first();
        return view('demo.show', ['demo' => $demo]);
    }
}
