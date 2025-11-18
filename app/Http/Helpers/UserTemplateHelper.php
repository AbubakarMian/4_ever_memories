<?php

namespace App\Http\Helpers;

use App\Models\Life_Tab_Arr;
use App\Models\UserWebsite;
use App\Models\Styling;
use App\Libraries\Common;

use App\Models\User;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTemplateHelper
{
    use  Common;
    public function save_memorial_user(Request $request, $user, $style)
    {
        $user_memorial = new User();
        $user_website = new UserWebsite();
        $user_website->style_id = $style->id;
        $user_website->web_html = $style->website_template->web_html;

        // $user_owner = UserWebsite::with('user', 'style.website_template')->get();

        $user_website->style_id = $style->id;
        $user_website->web_variable = json_encode($style->web_variable);
        $user_website->variable_html = json_encode($style->variable_html);
        $user_website->save();
        $birth = $request->b_year ? explode('-', $request->b_year) : []; // year/month/date
        $passed = $request->p_year ? explode('-', $request->p_year) : []; // year/month/date

        $web_variable = $style->web_variable;

        // $user 
        $web_variable['owner_user_var']['name_var'] = $user->name;
        $web_variable['owner_user_var']['full_name_var'] = $user->first_name;
        $web_variable['owner_user_var']['birth_var'] = $request->b_year;


        $web_variable['memorial_user_var']['name_var'] = $request->f_name;
        $web_variable['memorial_user_var']['full_name_var'] = $request->f_name . ' ' . $request->m_name . ' ' . $request->l_name;
        $web_variable['memorial_user_var']['birth_var'] = $request->b_year;
        $web_variable['memorial_user_var']['death_var'] = $request->p_year;
        $web_variable['memorial_user_var']['father_name_var'] = $request->l_name;
        $web_variable['memorial_user_var']['city'] = $request->b_city;
        $web_variable['memorial_user_var']['country'] = $request->b_country;
        $web_variable['tribute_text_var'] = $request->life_tab_arr;

        $user_website->web_variable = json_encode($web_variable);
        $user_website->variable_html = $style->variable_html; // json_encode
        $user_website->ad_name = $request->ad_name;
        $user_website->user_id = $user->id;
        $user_website->website_user_id = $user_memorial->id;
        $user_website->ad_lastname = $request->ad_lastname;
        // $user_website->background_audio = $this->move_audio_get_path($request->background_audio, 'background_audio');
        $user_website->background_voice = $this->move_img_get_path($request->background_audio, url('/'), 'background_audio');
        $user_website->ad_email = $request->ad_email;
        $user_website->ad_pwd = $request->ad_pwd;
        $user_website->full_name = $request->f_name ?? '' . ' ' . $request->m_name ?? '' . ' ' . $request->l_name ?? '';
        $user_website->f_name = $request->f_name;
        $user_website->m_name = $request->m_name;
        $user_website->l_name = $request->l_name;
        $user_website->image_show_var = $request->prof_img;
        $user_website->gender = $request->gender;
        $user_website->relation = $request->relation;
        $user_website->memorial_designation = $request->memorial_designation;
        // $user_website->b_year = isset($birth[0]) ?? '';
        $user_website->b_year = $request->b_year;
        $user_website->b_month =  isset($birth[1]) ?? '';
        $user_website->b_day =  isset($birth[2]) ?? '';
        $user_website->b_city = $request->b_city;
        $user_website->b_state = $request->b_state;
        $user_website->b_country = $request->b_country;
        // $user_website->p_year = isset($passed[0]) ?? '';
        // $user_website->p_year = $request->p_year;
        $user_website->p_year = isset($passed[0]) ? $passed[0] : '';
        $user_website->p_month = isset($passed[1]) ?? '';
        $user_website->p_day = isset($passed[2]) ?? '';
        $user_website->p_city = $request->p_city;
        $user_website->p_state = $request->p_state;
        $user_website->p_country = $request->p_country;
        $user_website->email = $request->memorial_name . '@4evermemorial.com';
        $user_website->visible_to_all = $request->visible_to_all ?? 0;

        $user_website->save();

        $user_website_life = new Life_Tab_Arr();
        $user_website_life->memorial_id = $user_website->id;
        $user_website_life->details_show_var = $request->life_tab_arr;
        $user_website_life->image_show_var = $request->life_image;
        $user_website_life->user_id =  $user->id;
        $user_website_life->save();

        return $user_website;
    }

    public function change_template(Request $request, $user_website_id, $css_style_id)
    {

        $user_website = UserWebsite::find($user_website_id);
        $user_website->style_id = $css_style_id;
        $style = Styling::find($css_style_id);
        $web_html = $style->website_template->web_html;

        $web_html = str_replace('{!!{memorial_style_var.style_script_var}!!}', $style->css_files, $web_html);
        $user_website->web_html = $web_html;
        $user_website->save();
        $res = new \stdClass();
        $res->status = true;
        $res->redirect = asset('user/get_memorial/' . $user_website->email);
        return $res;
    }
}
