<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UserTemplateHelper;
use App\Models\User;
use App\Models\UserWebsite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request ;

class UserController extends Controller
{
    public function index(){
        return view('admin.user.index');

    }
    public function getUsers($id = 0){
        $user = User::orderby('id','asc')->select('*')->get();
        $userData['data'] = $user;

        echo json_encode($userData);

    }
    public function add_user(Request $request){
        $user = Auth::user();
        // dd($request->all());
        $user_helper = new UserTemplateHelper();
        $user_web = $user_helper->save_memorial_user($request,$user);
        $response = new \stdClass();
        $response->status = true;
        $response->user_memorial = $user_web;
        return json_encode($response);
        // dd('saved');
        
        
    }
    public function plan(Request $request, $id){
        dd('asasasas');
        $plan=UserWebsite::find($id);
        $plan->plan_id = $request->plan;
        $plan->save();

    }
}
