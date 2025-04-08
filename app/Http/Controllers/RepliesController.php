<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Replies;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

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

        $data = $request -> validate ([
            'content' => ['required']
        ]);
        Replies::create($request->all());
        return response() -> json([
            'status' => 'success',
            'message' => 'Reply created succesfully'
        ],status:201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $replies = Replies::where('comment_id',$id)->get();

        return response()->json($replies);

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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
