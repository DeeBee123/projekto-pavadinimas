<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Child;
use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children = Child::all();
        return view('children.index', ['children' => $children]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fathers = \App\Models\Father::orderBy('id')->get();
        return view('children.create', ['fathers' => $fathers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChildRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChildRequest $request)
    {
        $this->validate(
            $request,
            [
                'father_id' => 'required',
                'name' => 'required',
            ]
        );

        $children = new Child();
        $children->name = $request->name;
        $imageName = time() . '.' . $request->url->extension();
        $request->url->move(public_path('images'), $imageName);
        $children->url = $imageName;
        $children->father_id = $request->father_id;
        $children->save();
        return redirect()->route('child.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function edit(Child $child)
    {
        $fathers = \App\Models\Father::orderBy('id')->get();


        return view('children.edit', ['child' => $child, 'fathers' => $fathers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChildRequest  $request
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChildRequest $request, Child $child)
    {
        $this->validate(
            $request,
            [
                'father_id' => 'required',
            ]
        );
        $child->name = $request->name;
        if ($request->url) {
            $imageName = time() . '.' . $request->url->extension();
            $request->url->move(public_path('images'), $imageName);
            $child->url = $imageName;
        }
        $child->father_id = $request->father_id;
        $child->save();
        return redirect()->route('child.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        $child->delete();
        return redirect()->route('child.index');
    }
}
