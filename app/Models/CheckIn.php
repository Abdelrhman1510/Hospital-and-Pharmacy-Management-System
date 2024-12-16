<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckIn extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_type', 'check_in_at', 'check_out_at'];
    public function user()
    {
        switch ($this->user_type) {
            case 'doctor':
                return $this->belongsTo(\App\Models\Doctor::class, 'user_id');
            case 'patient':
                return $this->belongsTo(\App\Models\Patient::class, 'user_id');
            case 'pharmacy_employee':
                return $this->belongsTo(\App\Models\PharmacyEmployee::class, 'user_id');
            case 'laboratorie_employee':
                return $this->belongsTo(\App\Models\LaboratorieEmployee::class, 'user_id');
            case 'ray_employee':
                return $this->belongsTo(\App\Models\RayEmployee::class, 'user_id');
            default:
                throw new \Exception("Invalid user type: {$this->user_type}");
        }
    }

    // Define relationships for each user type
    public function doctor()
    {
        return $this->belongsTo(\App\Models\Doctor::class, 'user_id');
    }

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'user_id');
    }

    public function pharmacyEmployee()
    {
        return $this->belongsTo(\App\Models\PharmacyEmployee::class, 'user_id');
    }

    public function laboratorieEmployee()
    {
        return $this->belongsTo(\App\Models\LaboratorieEmployee::class, 'user_id');
    }

    public function rayEmployee()
    {
        return $this->belongsTo(\App\Models\RayEmployee::class, 'user_id');
    }
}
