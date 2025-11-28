<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\User;
use App\Models\UserWebsite;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemorialController extends Controller
{
    public function index(){
        return view('admin.memorial_report.index');

    }
    public function getmemorials($id = 0){
        $memorial = UserWebsite::withTrashed()->whereHas('user')->orderby('id','asc')->select('*')->get();
        $memorialData['data'] = $memorial;
        // dd($memorialData);
        echo json_encode($memorialData);
                     
    }
    public function view_as_user($memorial_id){
        $memorial = UserWebsite::with('user')->where('id',$memorial_id)->first();
        Auth::login(User::find($memorial->user_id));
        $url = asset('user/get_memorial/').'/'.$memorial->email;
        return redirect($url);
    }
    public function get_gallery($id = 0){
        $gallery = Gallery::withTrashed()->where('memorial_id',$id)->orderby('id','asc')->get();
        $galleryData['data'] = $gallery;
        // dd($memorialData);
        echo json_encode($galleryData);
                     
    }
    public function gallery($memorial_id){
        return view('admin.memorial_report.gallery',compact('memorial_id'));
    }
    public function destroy_undestroy($id)
    {
        $memorial = UserWebsite::find($id);
        if ($memorial) {
            UserWebsite::destroy($id);
            $new_value = 'Activate';
        } else {
            UserWebsite::withTrashed()->find($id)->restore();
            $new_value = 'Delete';
        }
        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.delete'),
            'new_value' => $new_value
        ]);
        return $response;
    }
    public function restore($id)
    {
        UserWebsite::withTrashed()->find($id)->restore();

        
        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.delete'),
            'new_value' => ''
        ]);
        return $response;
    }
    public function restore_gallery($id)
    {
        Gallery::withTrashed()->find($id)->restore();

        
        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.delete'),
            'new_value' => ''
        ]);
        return $response;
    }
    public function invite_email(){
        return view('user.templates.email_temp');
    }
}
