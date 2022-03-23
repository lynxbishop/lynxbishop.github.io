<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $fillable = ['item_pos_id'];

    public function getStyle(){
        return $this->hasOne(ItemPos::class,'id','item_pos_id');
    }

}
