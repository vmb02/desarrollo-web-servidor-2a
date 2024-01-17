<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Train;
use DB;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trains = Train::all();
        return view('trains/index', ['trains' => $trains]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trains/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $train = new Train;
        $train -> name = $request -> input('name');
        $train -> passengers = $request -> input('passengers');
        $train -> year = $request -> input('year');
        $train -> train_type_id = $request -> input('train_type_id');
        $train -> save();

        return redirect('trains');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $train = Train::find($id);
        
        return view('trains/show', ['train'=>$train]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $train = Train::find($id);
        return view('trains/edit', ['train'=>$train]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $train = Train::find($id);
        
        $train -> name = $request -> input('name');
        $train -> passengers = $request -> input('passengers');
        $train -> year = $request -> input('year');
        $train -> train_type_id = $request -> input('train_type_id');
        $train -> save();

        return redirect('trains');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('trains')->where('id',"=",$id)->delete();
        return redirect('/trains');
    }
}
