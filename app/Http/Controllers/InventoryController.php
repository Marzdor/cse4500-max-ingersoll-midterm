<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends ApiController
{
    public function index()
    {
        $data = Inventory::all();
        return $this->successResponse($data);
    }

    public function show(Inventory $inventory)
    {
        try {
            return $this->successResponse($inventory);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $inventory = Inventory::create($request->all());
            return $this->successResponse($inventory, 'created', 201);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 422);
        }
    }

    public function update(Request $request, Inventory $inventory)
    {
        try {
            $inventory->update($request->all());
            return $this->successResponse($inventory, 'updated', 200);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 422);
        }
    }

    public function destroy(Inventory $inventory)
    {
        try {
            $inventory->delete();
            return $this->successResponse($inventory, 'deleted', 200);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 422);
        }
    }
}