<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'id_item',
        'quantity', 
        'price',
        'amount',
    ];

    /**
     * Relasi dengan model Item
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item');
    }
}
