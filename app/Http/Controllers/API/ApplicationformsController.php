<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\applicationform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Flash;
use Response;

class ApplicationformsController extends Controller {
    public $successStatus = 200;

    public function getAllApplicationforms(Request $request) {
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $applicationform = applicationform::all();

            return response()->json($applicationform, $this->successStatus);
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }        
    }  
    
    public function getApplicationform(Request $request) {
        $id = $request['pid']; // pid = applicationform id
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $applicationform = applicationform::where('id', $id)->first();

            if ($applicationform != null) {
                return response()->json($applicationform, $this->successStatus);
            } else {
                return response()->json(['response' => 'Applicationform not found!'], 404);
            }            
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }  
    }

    public function searchApplicationform(Request $request) {
        $params = $request['p']; // p = params
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $applicationform = applicationform::where('firstname', 'LIKE', '%' . $params . '%')
                ->orWhere('department', 'LIKE', '%' . $params . '%')
                ->get();
            // SELECT * FROM applicationform WHERE description LIKE '%params%' OR title LIKE '%params%'
            if ($applicationform != null) {
                return response()->json($applicationform, $this->successStatus);
            } else {
                return response()->json(['response' => 'Applicationform not found!'], 404);
            }            
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }  
    }
}