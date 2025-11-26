<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UserTemplateHelper;
use App\Models\User;
use App\Models\UserWebsite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
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
      public function signin_as_user(){
        return view('admin.user_signin.index');

    }
      public function make_admin(){
        return view('admin.make_admin.index');

    }
     public function create()
    {
        $control = 'create';
        // $courses = Courses::pluck('full_name','id');
        // $transport_type = Transport_Type::pluck('name', 'id');
        return view('admin.make_admin.create', compact(
            'control',
            //  'transport_type'
            ));
    }

    public function save(Request $request)
    {
        $make_admin = new User();
        return $this->add_or_update($request, $make_admin);

    }
    public function edit($id)
    {
        $control = 'edit';
        $make_admin = User::find($id);
        // $transport_type = Transport_Type::pluck('name', 'id');
        return view('admin.make_admin.create', compact(
            'control',
            'make_admin',
            // 'transport_type',

        )
        );
    }

    public function update(Request $request, $id)
    {
        $make_admin = User::find($id);
        // dd('sdas',$make_admin);
        return $this->add_or_update($request, $make_admin);
    }


   public function add_or_update(Request $request, $make_admin)
{
    $make_admin->first_name = $request->first_name;
    $make_admin->middle_name = $request->middle_name;
    $make_admin->last_name = $request->last_name;
    $make_admin->email = $request->email;
    $make_admin->gender = $request->gender;
    $make_admin->adderss = $request->adderss;
    $make_admin->password = $request-> password;
    $make_admin->role_id = 1;
    // dd($make_admin);
    $make_admin->save();

    return redirect('admin/make_admin');
}

    public function destroy_undestroy($id)
    {
        $make_admin = User::find($id);
        if ($make_admin) {
            User::destroy($id);
            $new_value = 'Activate';
        } else {
            User::withTrashed()->find($id)->restore();
            $new_value = 'Delete';
        }
        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.delete'),
            'new_value' => $new_value
        ]);
        return $response;
    }
    
}
