<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensaje = "Estas es la carta de nuestro restaurante: ";

        $platos = [
            ["Tortilla de patatas", 4.95, "Ración"],
            ["Chuletillas de cordero", 9.95, "Ración"],
            ["Ensaladilla rusa", 3.5, "Tapa"]
        ];

        $bebidas = [
            ["Coca Cola", 2.50, "Lata"],
            ["Tío Pepe", 7.95, "Botella"],
            ["Ron Cacique", 25, "Botella"]
        ];

        return view('carta', ['mensaje' => $mensaje, 'platos' => $platos, 'bebidas' => $bebidas]);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
