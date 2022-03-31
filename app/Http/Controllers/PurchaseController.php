<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchaseDB = Purchase::where('id', $id)->first();
        $equipmentDB = Equipment::where('purchase_uuid', $id)->first();

        if ($equipmentDB && $purchaseDB) {
            $purchase =  json_decode($purchaseDB->toJson());
            $equipment_serial_number = $equipmentDB->specifications['serial_number'];
            return view('purchases.edit', compact('purchase', 'equipment_serial_number'));
        }

        return abort(404);
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
        Purchase::where('id', $id)
            ->update([
                'invoice' => $request->invoice,
                'purchased_on' => $request->purchased_on,
                'user_info' => [
                    'first_name' => $request->user_info_first_name,
                    'last_name' => $request->user_info_last_name,
                    'email' => $request->user_info_email,
                    'phone_number' => $request->user_info_phone_number,
                ],
            ]);

        $equipment = Equipment::where('purchase_uuid', $id)->first();

        return redirect()->route('equipment.show', ['equipment' => $equipment]);
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