<?php

namespace App\Models;

use Database\Factories\ItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'current_stock',
        'minimum_stock',
        'monthly_consumption'
    ];

    protected static function newFactory()
    {
        return ItemFactory::new();
    }
}
