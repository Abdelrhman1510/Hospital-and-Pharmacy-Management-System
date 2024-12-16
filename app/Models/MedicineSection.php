<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicineSection extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // A section has many medicines
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
}
