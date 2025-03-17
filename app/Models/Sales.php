<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales'; // Nama tabel

    protected $fillable = [
        'tgl_sales',
        'id_customer',
        'do_number',
        'status',
    ];

    /**
     * Relasi ke model Customer.
     * Sales memiliki satu customer (many-to-one).
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
