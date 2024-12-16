<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_number', 'type', 'capacity', 'status', 'notes'];

    public function assignments()
    {
        return $this->hasMany(RoomAssignment::class);
    }
}
