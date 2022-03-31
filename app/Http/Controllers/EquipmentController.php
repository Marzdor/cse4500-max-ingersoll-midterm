<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Manufacturer;
use App\Models\Purchase;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentDB = Equipment::all();
        $equipment = [];

        foreach ($equipmentDB as $item) {

            $manufacturerDB = Manufacturer::where('id', $item->manufacturer_uuid)->first();
            $purchaseDB = Purchase::where('id', $item->purchase_uuid)->first();
            array_push($equipment, [
                'id' => $item->id,
                'name' => $item->name,
                'category' => $item->category,
                'specifications' => $item->specifications,
                'notes' => $item->notes,
                'customer_name' => $purchaseDB->user_info['first_name'] . " " . $purchaseDB->user_info['last_name'],
                'manufacturer_name' => $manufacturerDB->name
            ]);
        }
        return view('equipment', compact('equipment'));
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
    public function show(Equipment $equipment)
    {
        $manufacturerDB = Manufacturer::where('id', $equipment->manufacturer_uuid)->first();
        $manufacturer = $manufacturerDB;

        if ($manufacturerDB) {
            $manufacturer =  json_decode($manufacturerDB->toJson());
        }

        $purchaseDB = Purchase::where('id', $equipment->purchase_uuid)->first();
        $purchase = $purchaseDB;

        if ($purchaseDB) {
            $purchase = json_decode($purchaseDB->toJson());
        }


        return view('equipment.show', compact('equipment', 'manufacturer', 'purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipmentDB = Equipment::where('id', $id)->first();

        if ($equipmentDB) {
            $equipment =  json_decode($equipmentDB->toJson());
            return view('equipment.edit', compact('equipment'));
        }

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addNote($id)
    {
        $equipmentDB = Equipment::where('id', $id)->first();

        if ($equipmentDB) {
            $equipment =  json_decode($equipmentDB->toJson());
            return view('equipment.addNote', compact('equipment'));
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
    public function updateNotes(Request $request, $id)
    {
        $equipmentDB = Equipment::where('id', $id)->first();

        if ($equipmentDB) {
            $currentTime = date("Y-m-d h:i:s");
            $baseId = str_replace(" ", "", $request->message . $currentTime);
            $randomizedId = str_shuffle($baseId);
            $finalId = $randomizedId;

            if (strlen($randomizedId) > 20) {
                $finalId = substr($randomizedId, 0, 25);
            }

            $notes = $equipmentDB->notes;
            array_push($notes, ["id" => $finalId, "create_on" => $currentTime, 'message' => $request->message]);
            Equipment::where('id', $id)->update(['notes' => $notes]);

            $equipment =  Equipment::where('id', $id)->first();

            return redirect()->route('equipment.show', ['equipment' => $equipment]);
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
    public function deleteNote($equipmentId, $noteId)
    {
        $equipmentDB = Equipment::where('id', $equipmentId)->first();

        if ($equipmentDB) {
            $notes = $equipmentDB->notes;

            $newNotes = [];

            foreach ($notes as $obj) {
                if ($obj['id'] !== $noteId) {
                    array_push($newNotes, $obj);
                }
            }

            Equipment::where('id', $equipmentId)->update(['notes' => $newNotes]);

            $equipment =  Equipment::where('id', $equipmentId)->first();

            return redirect()->route('equipment.show', ['equipment' => $equipment]);
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
        Equipment::where('id', $id)
            ->update([
                'category' => $request->category,
                'specifications' => [
                    'serial_number' => $request->specification_serial_number,
                    'processor' => $request->specification_processor,
                    'ram' => $request->specification_ram,
                    'storage' => $request->specification_storage,
                    'mac_address' => $request->specification_mac_address,

                ],
            ]);

        $equipment = Equipment::where('id', $id)->first();

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