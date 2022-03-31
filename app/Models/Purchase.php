<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'price',
        'purchase_on',
        'user_info'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_info' => 'array',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'user_info' => '{
            "first_name": "",
            "last_name": "",
            "email":"",
            "phone_number": "",
        }'
    ];
}