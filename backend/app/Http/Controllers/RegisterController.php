<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class RegisterController extends Controller
{
    //
    public function index (Request $req) {
        Log::create(['log'=>$req->json_encode()]);
        return 'ok';
    }
}
