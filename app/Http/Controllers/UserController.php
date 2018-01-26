<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    // add or remove the ID from the user's saved listings
    public function toggle_saved()
    {
        $id = Input::get('id');
        if (!$id) return;
        $user = Auth::user();
        if (!$user) return;
        $saved = $user->saved;
        // check if the id already exists
        $key = array_search($id, $saved);
        if ($key === FALSE) {
            array_push($saved, $id); // add the id
        } else {
            array_splice($saved, $key, 1); // remove the id
        }
        $user->saved = $saved;
        $user->save();
        return response()->json();
    }
    
}
