<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'purchased_on',
        'manufacturer_uuid',
        'category',
        'user_uuid',
        'specifications',
        'notes'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'specifications' => 'array',
        'notes' => 'array',
    ];


    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'specifications' => '{
            "serial_number": "",
            "processor": "",
            "ram":"",
            "storage":"",
            "mac_address":""
        }',
        'notes' => '{
            "id": "",
            "created_on": "",
            "message": ""
        }',
    ];
}