<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsCustomer extends Model
{
    use HasFactory;

    protected $table = 'ms_customers';

    protected $primaryKey = 'customer_id';

    protected $guarded = ['customer_id', 'customer_balance'];

    public function mstopup(){
        return $this->hasMany(MsTopUp::class, 'customer_id', 'customer_id');
    }

    public function transactionheader(){
        return $this->hasMany(TransactionHeader::class, 'customer_id', 'customer_id');
    }

    public function mscart(){
        return $this->hasMany(MsCart::class, 'customer_id', 'customer_id');
    }
}