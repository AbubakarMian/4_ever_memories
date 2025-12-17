<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class AboutUsController extends Controller
{
function index(Request $request)
    {
        return view('admin/about_us/index');
    }
    function get_about_us(Request $request)
    {
        $about_us = About_us::orderBy('created_at', 'desc')->get();
        return $this->sendResponse(200,$about_us);
    }
    function compact_about_us(Request $request)
    {
        $about_us = About_us::first();
        $limit = 1025;

        $text = trim($about_us->description_first);
        $text = str_replace(["\r\n", "\r"], "\n", $text);
        if (mb_strlen($text) > $limit) {
            $firstText = mb_substr($text, 0, $limit);
            $firstText = preg_replace('/\s+\S*$/', '', $firstText);
            $secondText = mb_substr($text, mb_strlen($firstText));
        } else {
            $firstText  = $text;
            $secondText = '';
        }
        $paragraphs_first = array_filter(
            array_map('trim', explode("\n", $firstText))
        );

        $paragraphs_two = array_filter(
            array_map('trim', explode("\n", $secondText))
        );

        return view('user/aboutus', compact(
            'about_us',
            'paragraphs_first',
            'paragraphs_two'
        ));
    }
    
    public function create()
    {
        $control = 'create';
        // $courses = Courses::pluck('full_name','id');
        // $transport_type = Transport_Type::pluck('name', 'id');
        return view('admin.about_us.create', compact(
            'control',
            //  'transport_type'
            ));
    }

    public function save(Request $request)
    {
        $about_us = new About_us();
        return $this->add_or_update($request, $about_us);

    }
    public function edit($id = null){
    $control = 'edit';

    if ($id) {
        $about_us = About_us::findOrFail($id);
    } else {
        $about_us = About_us::first();
    }

    return view('admin.about_us.create', compact(
        'control',
        'about_us'
    ));
}

    public function update(Request $request, $id)
    {
        $about_us = About_us::find($id);
        // dd('sdas',$about_us);
        return $this->add_or_update($request, $about_us);
    }


   public function add_or_update(Request $request, $about_us)
{
    $about_us->description_first = $request->description_first;   

    if ($request->hasFile('image_url')) {

        // Correct parameter order
        $about_us->image = $this->move_img_get_path(
            $request->file('image_url'),
            url('/'),
            'about_us'
        );
    }

    $about_us->save();

    return redirect('admin/about_us');
}

    public function destroy_undestroy($id)
    {
        $about_us = About_us::find($id);
        if ($about_us) {
            About_us::destroy($id);
            $new_value = 'Activate';
        } else {
            About_us::withTrashed()->find($id)->restore();
            $new_value = 'Delete';
        }
        $response = Response::json([
            "status" => true,
            'action' => Config::get('constants.ajax_action.delete'),
            'new_value' => $new_value
        ]);
        return $response;
    }}
