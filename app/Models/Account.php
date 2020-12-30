<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Account extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_id';
    public $incrementing = false;
    protected $keyType = 'string';

    function setCredentialAttribute($credential){
        $this->attributes['credential'] = Crypt::encryptString($credential);
    }
    function getCredentialAttribute($credential){
        return Crypt::decryptString($credential);
    }
}
