<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    use HasFactory;
    public $fillable = ['lat','lng','address_id'];
    protected $hidden = [
        'id',
        'address_id',
        'created_at',
        'updated_at',
    ];
}
