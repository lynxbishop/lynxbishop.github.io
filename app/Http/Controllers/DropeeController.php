<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Pos;
use App\Models\ItemPos;

class DropeeController extends Controller
{
    public function index(){
        $gridsFind = Pos::with('pivotItem.getStyle')->get()->all();
        $grids = array_chunk($gridsFind, 4);
        return view('dropee.index',compact('grids'));
    }

    public function manage(){
        $gridsFind = Pos::with('pivotItem.getStyle',)->get()->all();
        $grids = array_chunk($gridsFind, 4);
        $dropDownList = Item::get();
        return view('dropee.manage',compact('grids','dropDownList'));
    }


    public function store(Request $request){
        $old = Pos::find($request->position)->pivotItem;
        if($old){
            $old->update(['item_pos_id'=>null]);
        }
        $save = new ItemPos();
        $save->pos_id = $request->position;
        $save->item_id = $request->item;
        $save->text_style = json_encode(['font-weight'=>$request->fontWeight ?? null , 'color'=>$request->favcolor ?? null]);
        if($save->save()){
            Item::where(['id'=>$request->item])->update(['item_pos_id'=>$save->id]);
            return true;
        }
        return false;
    }

}
