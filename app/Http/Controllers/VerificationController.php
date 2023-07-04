<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VerificationController extends Controller
{
    public function create(Request $request)
    {

        

        //https://laravel.com/docs/10.x/validation

        


        $validator = Validator::make($request->all(), [
            'check_date' => ['required', 'date'],
            'car_id' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Qui dovrò agire su DB facendo un INSERT
        $verification = new Verification();
        $verification->check_date = $request->input('check_date');
        $verification->car_id = $request->input('car_id');
        $verification->save();

        return response()->json($verification, 201);

    }

    public function delete(Request $request, $id)
    {
        //DELETE http://localhost:8000/api/users/7
        //$id = 7

        //Operazione di DELETE su DB

        $verification = Verification::where('id', '=', $id)->firstOrFail();
        $verification->delete();

        return response()->json(null, 204);
    }

    public function read(Request $request, $id)
    {
        //GET http://localhost:8000/api/users/3
        //$id=3

        //Operazione di SELECT su DB
        //$user = User::findOrFail($id);
        //$verification = Verification::where('id', '=', $id)->firstOrFail();
        $verification = Verification::with('car')->findOrFail($id);

        return response()->json($verification);

    }

    public function readAll(Request $request)
    {
        //Operazione di SELECT su DB
        //SELECT * FROM users 
        $verifications = Verification::get();
        return response()->json($verifications, 200);
    }

    public function update(Request $request, $id)
    {
        //PUT http://localhost:8000/api/users/22
        //$id=22     

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'check_date' => ['required', 'date'],
            'car_id' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Ora eseguo la UPDATE su database
        $verification = Verification::where('id', '=', $id)->firstOrFail();
        $verification->check_date = $request->input('check_date');
        $verification->car_id = $request->input('car_id');
        $verification->save();

        return response()->json($verification, 200);

    }
}
