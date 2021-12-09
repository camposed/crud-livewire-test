<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Script;

class ScriptController extends Controller
{
    public function allScripts(){
        return response()->json([
            "status" => 1,
            "msg" => "My Scripts",
            "data" => Script::all()
        ]);
    }
}
