<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\TrainType;
use DB;

class TrainTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $train_types = TrainType::all();
        return view('trainstype/index',[
            'train_types' => $train_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainstype/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $train_type = new TrainType;
        $train_type -> type = $request -> input('type');
        $train_type -> save();
        
        return redirect('trainstype');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $train_type = TrainType::find($id);
        
        return view('trainstype/show', ['train_type'=>$train_type]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $train_type = TrainType::find($id);
        return view('trainstype/edit', ['train_type'=>$train_type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $train_type = TrainType::find($id);
        
        $train_type -> type = $request -> input('type');
        $train_type -> save();

        return redirect('trainstype');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('train_types')->where('id',"=",$id)->delete();
        return redirect('/trainstype');
    }
}
