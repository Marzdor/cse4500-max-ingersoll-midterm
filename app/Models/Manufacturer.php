<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'name',
        'sales_info',
        'tech_support',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'sales_info' => 'array',
        'tech_support' => 'array',
    ];


    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'sales_info' => '{
            "email": "",
            "phone_number": ""
        }',
        'tech_support' => '{
            "email": "",
            "phone_number": ""
        }'
    ];
}
