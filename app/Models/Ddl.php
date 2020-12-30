<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ddl extends Model
{
    use HasFactory;
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';
}
