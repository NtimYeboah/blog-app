<?php

namespace App\Http\Controllers;

use App\Draft;
use Illuminate\Http\Request;

class DraftsController extends Controller
{
    /**
     * Display a listing of drafts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drafts = Draft::unpublished()->with('user')->paginate();

        return view('drafts.index', compact('drafts'));
    }

    /**
     * Show the form for creating a new draft.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $draft = app(Draft::class);

        return view('drafts.create', compact('draft'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        var_dump($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Draft $draft)
    {
        return view('drafts.show', compact('draft'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
