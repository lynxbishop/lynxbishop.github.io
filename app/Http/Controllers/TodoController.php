<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Company;
use App\Models\Geo;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodoController extends Controller
{


    private function seedUser(){
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $new_users = json_decode($response->body(),true);
        if(count($new_users)>0){
//            $addressData = array_column($new_users, 'address');
//            $companyData = array_column($new_users, 'company');
//            $geoData = array_column($addressData, 'geo');
            foreach($new_users as $k => $userData){
                $user = User::where('email',$userData['email'])->first();
                if(!$user){
                    $addressData = $userData['address'];
                    $companyData = $userData['company'];
                    $geoData = $addressData['geo'];
                    $user = User::create($userData);
//                    $address = Address::updateOrCreate(['user_id'=>$user->id],$addressData[$k]);
//                    Geo::updateOrCreate(['address_id'=>$address->id],$geoData[$k]);
//                    Company::updateOrCreate(['user_id'=>$user->id],$companyData[$k]);
                    $address = Address::updateOrCreate(['user_id'=>$user->id],$addressData);
                    Geo::updateOrCreate(['address_id'=>$address->id],$geoData);
                    Company::updateOrCreate(['user_id'=>$user->id],$companyData);
                }
            }
        }
    }

    private function seedTodo(){
        $response = Http::get('https://jsonplaceholder.typicode.com/todos');
        $new_todo = json_decode($response->body(),true);
        if(count($new_todo)>0){
            foreach($new_todo as $k => $todo){
                Todo::create($todo);
            }
        }
    }

    public function index(){
        $user = User::first();
        if(!$user){
            $this->seedUser();
            $this->seedTodo();
        }
        return redirect()->route('dropee.frontend');
    }

    public function index1(){
        $user_data = User::with(['todos'=>function($q){
            $q->where('completed','=',1);
        }])->get();
        return view('index',compact('user_data'));
    }

    public function index2(){
        $user_data = User::get();
        foreach($user_data as $key => &$data){
            $data->completed = Todo::where(['completed'=>1,'userId'=>$data->id])->count();
        }
        return view('index2',compact('user_data'));
    }

    public function index3(){
        $user_data = User::with('completed')->get();
        return view('index3',compact('user_data'));
    }

    public function api(){
        return view('api');
    }

}
