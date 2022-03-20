<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends ApiController
{
    public function index()
    {
        $data = Purchase::all();
        return $this->successResponse($data);
    }

    public function show(Purchase $purchase)
    {
        try {
            return $this->successResponse($purchase);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $purchase = Purchase::create($request->all());
            return $this->successResponse($purchase, 'created', 201);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 422);
        }
    }

    public function update(Request $request, Purchase $purchase)
    {
        try {
            $purchase->update($request->all());
            return $this->successResponse($purchase, 'updated', 200);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 422);
        }
    }

    public function destroy(Purchase $purchase)
    {
        try {
            $purchase->delete();
            return $this->successResponse($purchase, 'deleted', 200);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 422);
        }
    }
}