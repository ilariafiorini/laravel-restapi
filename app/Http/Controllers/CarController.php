<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CarController extends Controller
{
    public function create(Request $request)
    {

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'targa' => ['required', 'string','max:50', 'min:7'],
            'chilometraggio' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Qui dovrò agire su DB facendo un INSERT
        $car = new Car();
        $car->targa = $request->input('targa');
        $car->chilometraggio = $request->input('chilometraggio');
        $car->save();

        return response()->json($car, 201);

    }

    public function delete(Request $request, $id)
    {
        //DELETE http://localhost:8000/api/users/7
        //$id = 7

        //Operazione di DELETE su DB

        $car = Car::where('id', '=', $id)->firstOrFail();
        $car->delete();

        return response()->json(null, 204);
    }

    public function read(Request $request, $id)
    {
        //GET http://localhost:8000/api/users/3
        //$id=3

        //Operazione di SELECT su DB
        //$user = User::findOrFail($id);
        $car = Car::where('id', '=', $id)->firstOrFail();

        return response()->json($car);

    }

    public function readAll(Request $request)
    {
        //Operazione di SELECT su DB
        //SELECT * FROM users 
        $cars = Car::get();
        return response()->json($cars, 200);
    }

    public function update(Request $request, $id)
    {
        //PUT http://localhost:8000/api/users/22
        //$id=22     

        //https://laravel.com/docs/10.x/validation
        $validator = Validator::make($request->all(), [
            'targa' => ['required', 'string','size:50'],
            'chilometraggio' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        //Ora eseguo la UPDATE su database
        $car = Car::where('id', '=', $id)->firstOrFail();
        $car->targa = $request->input('targa');
        $car->chilometraggio = $request->input('chilometraggio');
        $car->save();

        return response()->json($car, 200);

    }
}
