<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimaonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class TestimaonialController extends Controller
{

 function index(Request $request)
    {
        return view('admin/testimonial/index');
    }
    function get_testimonial(Request $request)
    {
        $testimonial = Testimaonial::get();
        return $this->sendResponse(200,$testimonial);
    }
     function compact_testimonial(Request $request)
    {
        $testimonial = Testimaonial::get();
        return view('user/testimonials', compact('testimonial'));
    }
    
    public function create()
    {
        $control = 'create';
        // $courses = Courses::pluck('full_name','id');
        // $transport_type = Transport_Type::pluck('name', 'id');
        return view('admin.testimonial.create', compact(
            'control',
            //  'transport_type'
            ));
    }

    public function save(Request $request)
    {
        $testimonial = new Testimaonial();
        return $this->add_or_update($request, $testimonial);

    }
    public function edit($id)
    {
        $control = 'edit';
        $testimonial = Testimaonial::find($id);
        // $transport_type = Transport_Type::pluck('name', 'id');
        return view('admin.testimonial.create', compact(
            'control',
            'testimonial',
            // 'transport_type',

        )
        );
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimaonial::find($id);
        // dd('sdas',$testimonial);
        return $this->add_or_update($request, $testimonial);
    }


   public function add_or_update(Request $request, $testimonial)
{
    $testimonial->subject = $request->subject;
    $testimonial->title = $request->title;
    $testimonial->description = $request->description;

   
    $testimonial->save();

    return redirect('admin/testimonial');
}

    public function destroy_undestroy($id)
    {
        $testimonial = Testimaonial::find($id);
        if ($testimonial) {
            Testimaonial::destroy($id);
            $new_value = 'Activate';
        } else {
            Testimaonial::withTrashed()->find($id)->restore();
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
