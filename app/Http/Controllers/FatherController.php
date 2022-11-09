<?php

namespace App\Http\Controllers;

use App\Models\Father;
use App\Http\Requests\StoreFatherRequest;
use App\Http\Requests\UpdateFatherRequest;

class FatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fathers = \App\Models\Father::orderBy('id', 'desc')->get();

        return view('fathers.index', ['fathers' => $fathers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('fathers.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFatherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFatherRequest $request)
    {

        $father = new Father();
        $father->fill($request->all());
        $father->save();
        return redirect()->route('father.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function show(Father $father)
    {
        return redirect()->route('father.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function edit(Father $father)
    {
        return view('fathers.edit', ['father' => $father]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFatherRequest  $request
     * //UpdateFatherRequest pakeist i true
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFatherRequest $request, Father $father)
    {

        $father->fill($request->all());
        $father->save();
        return redirect()->route('father.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Father  $father
     * @return \Illuminate\Http\Response
     */
    public function destroy(Father $father)
    {

        $father->delete();
        return redirect()->route('father.index');
    }
}
