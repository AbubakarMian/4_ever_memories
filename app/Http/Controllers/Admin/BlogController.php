<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class BlogController extends Controller
{
 function index(Request $request)
    {
        return view('admin/blog/index');
    }
    function get_blog(Request $request)
    {
        $blog = Blog::orderBy('created_at', 'desc')->get();
        return $this->sendResponse(200,$blog);
    }
     function compact_blog(Request $request, $category = null)
    {
        $categories = Blog::distinct()->pluck('tags')
        ->flatMap(fn($tags) => explode(',', $tags))
        ->map(fn($tag) => trim($tag))
        ->unique()
        ->values()
        ->toArray();
        if($category){
            
        $blog = Blog::orderBy('created_at', 'desc')->all()->filter(function ($blogItem) use ($category) {
            $tags = explode(',', $blogItem->tags);
            foreach ($tags as $tag) {
                $tagSlug = strtolower(str_replace(' ', '-', trim($tag)));
                if ($tagSlug === $category) {
                    return true;
                }
            }
            return false;
        });
        }
        else{
            $blog = Blog::get();
        }
        return view('user/blog', compact('blog','categories'));
    }
    
    public function create()
    {
        $control = 'create';
        return view('admin.blog.create', compact(
            'control',
            ));
    }

    public function save(Request $request)
    {
        $blog = new blog();
        return $this->add_or_update($request, $blog);

    }
    public function edit($id)
    {
        $control = 'edit';
        $blog = Blog::find($id);
        return view('admin.blog.create', compact(
            'control',
            'blog',
        )
        );
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        return $this->add_or_update($request, $blog);
    }


   public function add_or_update(Request $request, $blog)
{
    $blog->subject = $request->subject;
    $blog->title = $request->title;
    $blog->description = $request->description;
    $blog->tags = $request->tags;

    if ($request->hasFile('image_url')) {
        $blog->image = $this->move_img_get_path(
            $request->file('image_url'),
            url('/'),
            'blog'
        );
    }

    $blog->save();

    return redirect('admin/blog');
}

    public function destroy_undestroy($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            Blog::destroy($id);
            $new_value = 'Activate';
        } else {
            Blog::withTrashed()->find($id)->restore();
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
