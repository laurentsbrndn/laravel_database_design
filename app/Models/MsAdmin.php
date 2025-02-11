<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsAdmin extends Model
{
    use HasFactory;

    protected $table = 'ms_admins';

    protected $primaryKey = 'admin_id';
    
    protected $guarded = ['admin_id'];

    public function transactionheader(){
        return $this->hasMany(TransactionHeader::class, 'admin_id', 'admin_id');
    }
}
