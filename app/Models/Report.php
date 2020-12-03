<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'completed_view';

    public function user(){
        return $this->belongsTo('App\Models\User','userId');
    }

}
