<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsCourier extends Model
{
    use HasFactory;

    protected $table = 'ms_couriers';

    protected $primaryKey = 'courier_id';

    protected $guarded = ['courier_id'];

    public function msshipment(){
        return $this->hasMany(MsShipment::class, 'courier_id', 'courier_id');
    }
}
