<?php

namespace App\libraries;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Response;
use DB;

// use Excel;
// use Excel;

trait Common
{


    public function set_attribute_arr_pics($attributes)
    {
        $attribute_arr = [];
        foreach ($attributes as $key => $attribute) {
            // dd($attribute);
            $attribute_arr[$key] = $attribute;

            // if($attribute['type_var'] == 'flower'){
            //     $pic = asset('user_templates/template_1/images/imgs/flower.png');
            // }
            // elseif($attribute['type_var'] == 'candle'){
            //     $pic = asset('user_templates/template_1/images/imgs/candle.png');
            // }
            // else{//feather
            //     $pic = asset('user_templates/template_1/images/imgs/feather.png');
            // }
            $pic = $attribute['image_tribute'];

            $attribute['image_show_var'] = $pic;
            $attribute_arr[$key]['image_show_var'] = $pic;
        }
        // dd($attribute_arr);
        return $attribute_arr;
    }

    public function get_permission_details($all_permissions, $role_permissions)
    {
        $all_permissions = $all_permissions->transform(function ($all_p) use ($role_permissions) {
            $per = $role_permissions->where('admin_url_id', $all_p->id)->first();
            if ($per) {
                $all_p->permission_granted = true;
                $per_details = collect(json_decode($per->details));
                $all_p_details = collect(json_decode($all_p->details));

                $all_p_details = $all_p_details->transform(function ($all_p_detail) use ($per) {
                    $per_details = collect(json_decode($per->details));
                    $p_detail = $per_details->where('id', $all_p_detail->id)->first();
                    if ($p_detail) {
                        $all_p_detail->permission_granted = true;
                    } else {
                        $all_p_detail->permission_granted = false;
                    }
                    return $all_p_detail;
                });
                $all_p_details = json_encode($all_p_details->toArray());
                $all_p->details = $all_p_details;
                return $all_p;
            } else {
                $all_p->permission_granted = false;
            }
            return $all_p;
        });
        return $all_permissions;
    }

    public function prepare_excel($data, $field_not_required = [])
    {
        $users = [];
        foreach ($data as $rec_key => $value) {
            foreach ($value as $key => $v) {
                if (!in_array($key, $field_not_required)) {
                    $users[$rec_key][str_replace("_", " ", $key)] = $v;
                }
            }
        }
        return $users;
    }

    public function time_to_timestamp($time)
    {

        $time_arr =  explode(':', $time);
        $time_hr = $time_arr[0];
        $time_min = $time_arr[1];
        $total_mins = ($time_hr * 60) + $time_min;
        $total_sec = $total_mins * 60;
        // $total_mili_sec = $total_sec * 1000;
        return $total_sec;
    }

    public function time_to_timestamp_group($time)
    {

        $time_arr =  explode(':', $time);
        $time_hr = $time_arr[0];
        $time_min = $time_arr[1];
        $gmt_sec = 300 * 60;
        $total_mins = ($time_hr * 60) + $time_min;
        $total_sec = $total_mins * 60;
        $total_sec_gmt_minus = $total_sec - $gmt_sec;
        // $total_mili_sec = $total_sec * 1000;
        return $total_sec_gmt_minus;
    }

    public function move_img_get_path($image, $root, $type, $image_name = '')
    {
        $uniqid = time();
        $extension = mb_strtolower($image->getClientOriginalExtension());
        $name = $uniqid . $image_name . '.' . $extension; //.$image->getClientOriginalName();
        $imgPath = public_path() . '/images/' . $type;
        $image->move($imgPath, $name);
        $remove_index = str_replace("index.php", "", $root);
        return $remove_index . '/public/images/' . $type . '/' . $name;
    }
    public function move_audio_get_path($audio, $root, $type, $audio_name = '')
    {
        $uniqid = time();
        $extension = mb_strtolower($audio->getClientOriginalExtension());
        $name = $uniqid . $audio_name . '.' . $extension;
        
        // Changed from '/images/' to '/audio/'
        $audioPath = public_path() . '/audio/' . $type;
        
        // Create directory if it doesn't exist
        if (!File::exists($audioPath)) {
            File::makeDirectory($audioPath, 0755, true);
        }
        
        $audio->move($audioPath, $name);
        $remove_index = str_replace("index.php", "", $root);
        
        // Return path to audio file (not images)
        return $remove_index . '/audio/' . $type . '/' . $name;
    }

    function get_embeddedyoutube_url($url)
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "//www.youtube.com/embed/$2",
            $url
        );
    }

    public function sort_asc_array($arr, $column)
    {
        usort($arr, function ($a, $b) use ($column) {
            return $a[$column] <=> $b[$column];
        });
        return $arr;
    }


    function getDistance($latitude1, $longitude1, $latitude2, $longitude2)
    {
        $earth_radius = 6371;

        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

        return $d;
    }
}
