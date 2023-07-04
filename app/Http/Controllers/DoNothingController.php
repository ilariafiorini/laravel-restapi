<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DoNothing;

class DoNothingController extends Controller {
    public function doNothing()
    {
        return response()->json(null, 419);
    }

}