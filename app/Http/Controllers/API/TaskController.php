<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(){
        $data = Tasks::all();
        
        return response()->json($data);
    }

    public function create(Request $request){
        
        $validated = Validator::make($request->all(),[
            'taskName' => 'required | min:3 | max:200',
            'category'=> 'required',
            'createdDate' => 'required',
            'owner'=> 'required']
        );

        if($validated->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ],401);
        }
        
        $data = Tasks::create([
            'taskName' => $request->taskName,
            'details' => $request->details,
            'created' => $request->createdDate,
            'category' => $request->category,
            'owner' => $request->owner
        ]);
        
        return response()->json($data,201);

    }

    public function update(Request $request, $id){
      
        if($data = Tasks::find($id)){

            $validated = Validator::make($request->all(),[
                'taskName' => 'required | min:3 | max:200',
                'category'=> 'required',
                'createdDate' => 'required',
                'owner'=> 'required']
            ); 

            if($validated->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validated->errors()
                ],401);
            }
            if($validData = $validated->validated()){
                $data->taskName = $validData['taskName'];
                $data->details = $request['details'];
                $data->created = $validData['createdDate'];
                $data->category = $validData['category'];
                $data->owner = $validData['owner'];

            }
            $data->save();

            return response()->json($data,200);
             
      }
      else{
        return response()->json([
            'status' => false,
            'message' => 'error'],404);
      }
       
        
    }

    public function delete($id){
        if($data = Tasks::find($id)){

            $result = $data->delete();

            return response()->json([
                'status' => true,
                'message' => 'delete success'],200);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'error'],404);
        }
        
    }
}
