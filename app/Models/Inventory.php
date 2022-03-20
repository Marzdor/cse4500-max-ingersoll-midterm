<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'purchased_on',
        'manufacturer_uuid',
        'category',
        'user_uuid'
    ];
}
