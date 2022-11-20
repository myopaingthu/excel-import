<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department',
        'equipment_type',
        'item_category',
        'item_sub_category',
        'demand_qty',
        'demand_unit',
        'demand_unit_price',
        'demand_total_price',
        'analyzed_data_name'
    ];
}
