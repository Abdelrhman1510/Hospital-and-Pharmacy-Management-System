<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['medicine_section_id', 'name', 'brand', 'price', 'stock', 'description'];

    // A medicine belongs to a section
    public function section()
    {
        return $this->belongsTo(MedicineSection::class, 'medicine_section_id');
    }
    public function invoices()
{
    return $this->belongsToMany(MedicineInvoice::class)
                ->withPivot('quantity', 'total')
                ->withTimestamps();
}
}
