<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class JsonController extends Controller
{
    public function index(){
        // $data= Test::where('meta_data->name','John')->get();
        // return $data;
        
        $data= Test::all();
        return $data;
        // return $data->meta_data['address']['house'];


    }
    public function store(){
        
        $test = new Test();
        $data = [
                'name'=>'John',
                'age'=>30,
                'city'=>'New York',
                'address'=>[
                    'house'=>'123',
                    'street'=>'5th Avenue',
                    'number'=>10
                ]
            ];
        $test->meta_data = $data;
        $test->save();

        return response()->json([
            'message'=>'Test created successfully',
            'data'=>$test
        ],201);
    }

    public function json_update(){
        
        $data= Test::where('id',1)->update(
            [
            'meta_data->name'=>'Aamir',
                'meta_data->age'=>60,
                'meta_data->city'=>'Mumbai',
                'meta_data->address'=>[
                    'house'=>'13',
                    'street'=>'5th Bandra',
                    'number'=>14
                ]
            ]);
        
        return response()->json([
            'message'=>'Test updated successfully',
            'data'=>$data
        ],201);
        // another way to update json column
        // $data= Test::find(1);
        // $data->meta_data = [
        //     'name'=>'Aamir',
        //     'age'=>60,
        //     'city'=>'Mumbai',            
        //     'address'=>[
        //         'house'=>'13',
        //         'street'=>'5th Bandra',
        //         'number'=>14
        //     ]
        // ];
        // $data->save();   
        // return $data;
        // NOTE => open test.php Model and set protected $casts = ['meta_data'=>'AsArrayObject::class'];
    }

    public function json_delete(){
        $data= Test::find(1);
        //$data->meta_data = collect($data->meta_data)->except(['age','address.house'])->toArray();     // remove age and address.house from json column
        $data->meta_data = collect($data->meta_data)->forget(['age','address']);    // remove age and address.house from json column
        $data->save();

        return response()->json([
            'message'=>'Test deleted successfully',
            'data'=>$data
        ],201);
    }
}
