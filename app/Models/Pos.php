<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    use HasFactory;

    protected $table = 'pos';
    protected $primaryKey = 'id';

    public function getItem(){
        return $this->belongsTo('App\Models\Item','id','item_pos_id');
    }

    public function pivotItem(){
        return $this->hasOneThrough(Item::class,ItemPos::class)->orderBy('item_pos.created_at','desc');
    }

}
