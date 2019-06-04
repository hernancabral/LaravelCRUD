<?php

namespace App\Http\Controllers;

use App\Planning;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plannings = Planning::all();

        return view('planning.index', compact('plannings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('planning.create', compact('tags'));     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'unique:plannings,name,',
            'tag_id' => 'exists:tags,id',
        ]);

        Planning::create($validatedData);

        return redirect('/planning')->with(['msg' => 'success','txt' => 'Se guardo el Planning!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function show(Planning $planning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function edit(Planning $planning)
    {

        $planning = Planning::findOrFail($planning->id);
        $tags = Tag::all();

        return view('planning.edit', compact('planning', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planning $planning)
    {
        $validatedData = $request->validate([
            'name' => 'unique:plannings,name,' . $planning->name,
            'tag_id' => 'exists:tags,id',
        ]);

        Planning::whereId($planning->id)->update(array_filter($validatedData));

        return redirect('/planning')->with(['msg' => 'success','txt' => 'Se actualizo correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planning $planning)
    {
        $planning = Planning::findOrFail($planning->id);
        $planning->delete();

        return redirect('/planning')->with(['msg' => 'success','txt' => 'Se borro correctamente']);
    }
}
