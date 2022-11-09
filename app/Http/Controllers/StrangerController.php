<?php

namespace App\Http\Controllers;

use App\Models\Stranger;
use App\Http\Requests\StoreStrangerRequest;
use App\Http\Requests\UpdateStrangerRequest;

class StrangerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('strangers.index', ['strangers' => Stranger::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('strangers.create', ['strangers' => Stranger::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStrangerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStrangerRequest $request)
    {
    $stranger= new Stranger();
    $stranger-> fill($request->all());
    $stranger->save();
    return redirect()-> route('stranger.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stranger  $stranger
     * @return \Illuminate\Http\Response
     */
    public function show(Stranger $stranger)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stranger  $stranger
     * @return \Illuminate\Http\Response
     */
    public function edit(Stranger $stranger)
    {
        return view('strangers.edit',['stranger'=>$stranger]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStrangerRequest  $request
     * @param  \App\Models\Stranger  $stranger
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStrangerRequest $request, Stranger $stranger)
    {
        $stranger->fill($request->all());
        $stranger->save();
        return redirect()-> route('stranger.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stranger  $stranger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stranger $stranger)
    {
        $stranger->delete();
        return redirect()->route('stranger.index');
    }
}
