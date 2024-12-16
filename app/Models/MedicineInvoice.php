<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicineInvoice extends Model
{
    protected $fillable = ['invoice_number', 'total'];

    // Define the relationship with the medicines
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class)->withPivot('quantity', 'total');
    }
}
