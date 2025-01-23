<?php

namespace App\Http\Controllers;
use App\Models\Apidetail;
use Illuminate\Http\Request;

class ApiManagementController extends Controller
{
    public function apiDataStore(Request $req)
    {
        $edit_id = $req->input('edit_id');
        // $apiDetails = $edit_id ? Apidetail::find($edit_id) : new Apidetail();
        $apiDetails = Apidetail::find(31);
        $allowedKeys = ['name', 'groupName', 'description'];
        $key = $req->input('key');
        $value = $req->input('value');
        if (in_array($key, $allowedKeys)) {
            $apiDetails->$key = $value;
            if ($apiDetails->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'The key-value pair has been saved.'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'There was a problem saving the data.'
                ], 500);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid key provided.'
            ], 400);
        }
    }
    public function apiDetails(Request $req){
        $data = Apidetail::find(31);
        return response()->json([
            'success' => True,
            'data'=>$data,
        ]);
    }
}
