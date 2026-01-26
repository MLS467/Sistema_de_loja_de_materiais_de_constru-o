<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(["status" => true, "data" => Stock::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->all();

        $value = Stock::create($result);

        if (!$value)
            return response()->json(["status" => false, "message" => "Não é possível inserir no estoque."], 403);


        return response()->json(["status" => true, "message" => "inserido com sucesso."], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return response()->json(["status" => true, "data" => $request->all()], 200);
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