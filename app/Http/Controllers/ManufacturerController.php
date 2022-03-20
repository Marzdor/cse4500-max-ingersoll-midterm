<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends ApiController
{
    public function index()
    {
        $data = Manufacturer::all();
        return $this->successResponse($data);
    }

    public function show(Manufacturer $manufacturer)
    {
        try {
            return $this->successResponse($manufacturer);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $manufacturer = Manufacturer::create($request->all());
            return $this->successResponse($manufacturer, 'created', 201);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 422);
        }
    }

    public function update(Request $request, Manufacturer $manufacturer)
    {
        try {
            $manufacturer->update($request->all());
            return $this->successResponse($manufacturer, 'updated', 200);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 422);
        }
    }

    public function destroy(Manufacturer $manufacturer)
    {
        try {
            $manufacturer->delete();
            return $this->successResponse($manufacturer, 'deleted', 200);
        } catch (\Throwable $th) {
            $this->errorResponse($th->getMessage(), 422);
        }
    }
}
