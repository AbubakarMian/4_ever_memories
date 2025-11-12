<?php

namespace Database\Seeders;

use App\Models\Styling;
use App\Models\WebsiteTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class StylingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image_path = asset('public') . '/';
        // $public_path = 'https://stagging.hatinco.com/4_ever_memories/public/';
        // $public_path = 'https://stagging.hatinco.com/4_ever_memories/public/';
        // $public_path = 'http://localhost/4_ever_memories/public/';
        $public_path = Config::get('app.url') . '/public/';
        $url_path = Config::get('app.url');

        $template_name_arr = ['template_1', 'template_2', 'template_3', 'template_4'];
        $default_template = 'template_1';

        foreach ($template_name_arr as $key => $template_name_css_path) {
            Styling::where('name', $template_name_css_path)->delete();

            $style = new Styling();
            $style->id = ($key + 1);
            $style->name = $template_name_css_path;
            $web_template = WebsiteTemplate::first();
            $style->website_template_id = $web_template->id;
            $style->css_files = $public_path . 'user_templates/' . $template_name_css_path . '/css/style.css';
            $style->template_image = $public_path . 'user_templates/slider/image/' . $template_name_css_path . '.png';

            $web_variable_std = new \stdClass();

            $web_variable_std->owner_user_var = new \stdClass();

            $web_variable_std->owner_user_var->id = "03";
            $web_variable_std->owner_user_var->name_var = "Anthony";
            $web_variable_std->owner_user_var->full_name_var = "Anthony Joseph Bouslaiby";
            $web_variable_std->owner_user_var->birth_var = "2004";
            $web_variable_std->owner_user_var->death_var = "2022";
            $web_variable_std->owner_user_var->father_name_var = "Anthony Father";
            $web_variable_std->owner_user_var->image_var = $public_path . "user_templates/" . $default_template . "/images/profile_pic.jpg";

            $web_variable_std->total_views_var = "90";
            $web_variable_std->tribute_text_var = "This memorial website was created in memory of our beloved son,Anthony Bouslaiby, 18 years old, born on September 1, 2004, and passed away onDecember 11, 2022. He will be with us forever, and we will never stop loving him. Idecided to start this website to celebrate his life. Even though he wasnt with us as long as he shouldve been, he has touched so many lives and was so loved. I hope you all will contribute to this page, with picture, videos, and stories_arr. I was so touched by all the memories left in the memory jar at the luncheon. Please feel free to add more, as they may come to you, because thats all we have left once a loved one leaves us. We all appreciate the love you showed Anthony for however long you may have known him. Thank you all!<br> Angela (his mom) <br> P.S. Please let me know if you have any probelms uploading etc. You can click on a  photo to see the caption.";
            $web_variable_std->recent_updates_show_arr = [];

            $web_variable_std->recent_updates_show_arr[0] = new \stdClass();
            $web_variable_std->recent_updates_show_arr[0]->date_var = "February 2";
            $web_variable_std->recent_updates_show_arr[0]->type_var = "tribute";
            $web_variable_std->recent_updates_show_arr[0]->number_var = 1;
            $web_variable_std->recent_updates_show_arr[0]->message_var = "added 1 tribute";

            // $web_variable_std->recent_updates_show_arr[1] = new \stdClass();
            // $web_variable_std->recent_updates_show_arr[1]->date_var = "February 3";
            // $web_variable_std->recent_updates_show_arr[1]->type_var = "photos";
            // $web_variable_std->recent_updates_show_arr[1]->number_var = 3;
            // $web_variable_std->recent_updates_show_arr[1]->message_var = "added 3 photos";

            // $web_variable_std->recent_updates_show_arr[2] = new \stdClass();
            // $web_variable_std->recent_updates_show_arr[2]->date_var = "February 5";
            // $web_variable_std->recent_updates_show_arr[2]->type_var = "tribute";
            // $web_variable_std->recent_updates_show_arr[2]->number_var = 2;
            // $web_variable_std->recent_updates_show_arr[2]->message_var = "added 2 tributes";

            $web_variable_std->icon_list_var = new \stdClass();
            $web_variable_std->icon_list_var->flower_image_var = $public_path . "user_templates/" . $default_template . "/images/imgs/flower.png";
            $web_variable_std->icon_list_var->candel_image_var = $public_path . "user_templates/" . $default_template . "/images/imgs/candle.png";
            $web_variable_std->icon_list_var->feather_image_var = $public_path . "user_templates/" . $default_template . "/images/imgs/feather.png";


            $web_variable_std->memorial_user_var = new \stdClass();
            $web_variable_std->memorial_user_var->id = "03";
            $web_variable_std->memorial_user_var->name_var = "Anthony";
            $web_variable_std->memorial_user_var->full_name_var = "Anthony Joseph Bouslaiby";
            $web_variable_std->memorial_user_var->birth_var = "2004";
            $web_variable_std->memorial_user_var->death_var = "2022";
            $web_variable_std->memorial_user_var->father_name_var = "Anthony Father";
            $web_variable_std->memorial_user_var->city_var = "London";
            $web_variable_std->memorial_user_var->country_var = "England";
            $web_variable_std->memorial_user_var->image_var = $public_path . "user_templates/" . $default_template . "/images/profile_pic.jpg";


            $web_variable_std->memorial_style_var = new \stdClass();
            $web_variable_std->memorial_style_var->style_script_var = $public_path . "user_templates/" . $default_template . "/css/style.css";


            $web_variable_std->tributes_arr = [];
            $web_variable_std->tributes_arr[0] = new \stdClass();
            $web_variable_std->tributes_arr[0]->user_name_show_var = "Maria Nashed";
            $web_variable_std->tributes_arr[0]->type_var = "flower";
            $web_variable_std->tributes_arr[0]->date_show_var = "January 23";
            $web_variable_std->tributes_arr[0]->details_show_var = "Anthony was an amazingly sweet friend. After class he would always walk me to my car and then I would drive him to his. We would always have a good time laughing at the way we pronounced Arabic words due to difference in dialect even though he knew little-to-no Arabic at all lol. I also remember how whenever I would ask for help on homework, he would always insist on teaching me how to do the problems fully in order for me to better.";
            $web_variable_std->tributes_arr[0]->date_var = "23/01/1990";
            $web_variable_std->tributes_arr[0]->image_show_var = $public_path . "user_templates/" . $default_template . "/images/imgs/flower.png";

            $web_variable_std->tributes_arr[1] = new \stdClass();
            $web_variable_std->tributes_arr[1]->user_id = "1";
            $web_variable_std->tributes_arr[1]->image_show_var = $public_path . "user_templates/" . $default_template . "/images/imgs/candle.png";
            $web_variable_std->tributes_arr[1]->user_name_show_var = "Norice Mazmanian";
            $web_variable_std->tributes_arr[1]->type_var = "candle";
            $web_variable_std->tributes_arr[1]->date_show_var = "January 22";
            $web_variable_std->tributes_arr[1]->details_show_var = "I remember one day after my bone marrow transplant. I was staying at my daughters house while recovering. I think my daughter had to go out and all of a sudden Anthony came to my room and pulled up a chair. No doubt he was told to make sure I didnot get out of bed. Anyway we started talking and I asked him about school and what he was learning. I think it was some scientific thing that he started explaining to me.";
            $web_variable_std->tributes_arr[1]->date_var = "23/01/1993";

            $web_variable_std->tributes_arr[2] = new \stdClass();
            $web_variable_std->tributes_arr[2]->user_id = "1";
            $web_variable_std->tributes_arr[2]->image_show_var = $public_path . "user_templates/" . $default_template . "/images/imgs/candle.png";
            $web_variable_std->tributes_arr[2]->user_name_show_var = "Adriana Villarreal";
            $web_variable_std->tributes_arr[2]->type_var = "candle";
            $web_variable_std->tributes_arr[2]->date_show_var = "January 21";
            $web_variable_std->tributes_arr[2]->details_show_var = "Anthony was such a kind person he never made me feel left out nor ever judged me.";
            $web_variable_std->tributes_arr[2]->date_var = "21/01/1995";


            $web_variable_std->tributes_arr[3] = new \stdClass();
            $web_variable_std->tributes_arr[3]->user_id = "1";
            $web_variable_std->tributes_arr[3]->image_show_var = $public_path . "user_templates/" . $default_template . "/images/imgs/candle.png";
            $web_variable_std->tributes_arr[3]->user_name_show_var = "Norice Mazmanian";
            $web_variable_std->tributes_arr[3]->type_var = "candle";
            $web_variable_std->tributes_arr[3]->date_show_var = "January 22";
            $web_variable_std->tributes_arr[3]->details_show_var = "Anthony was always precocious and asked every question ever. I loved his need to know more and more and to question. He always made me laugh. My favorite memories are long conversations with him. He could talk. And was so interesting. He was sweet and generous to everyone. He loved being in charge of projects and got any job done always wanting to do more. I miss his voice and laugh and \" yo, Mrs Johnson! You vibing?\" Anthony you will remain in my heart forever.";
            $web_variable_std->tributes_arr[3]->date_var = "21/01/1997";


            $web_variable_std->life_tab_arr = [];
            $web_variable_std->life_tab_arr[0] = new \stdClass();
            $web_variable_std->life_tab_arr[0]->user_id = "1";
            $web_variable_std->life_tab_arr[0]->user_name = "Antony";
            $web_variable_std->life_tab_arr[0]->image_show_var =  $public_path . "user_templates/" . $default_template . "/images/baby_cot.png";
            $web_variable_std->life_tab_arr[0]->details_show_var = "Anthony was born in September 1, 2004 via scheduled C-section at San Dimas Community Hospital in San Dimas. He was 8 lbs 10 oz...";


            $web_variable_std->gallery_photo_arr = [];
            $web_variable_std->gallery_photo_arr[0] = new \stdClass();
            $web_variable_std->gallery_photo_arr[0]->id = "1";
            $web_variable_std->gallery_photo_arr[0]->user_id = "1";
            $web_variable_std->gallery_photo_arr[0]->image_show_var =  $public_path . "user_templates/" . $default_template . "/images/download.jpg";


            $web_variable_std->gallery_audio_arr = [];
            $web_variable_std->gallery_audio_arr[0] = new \stdClass();
            $web_variable_std->gallery_photo_arr[0]->id = "2";
            $web_variable_std->gallery_audio_arr[0]->user_id = "1";
            $web_variable_std->gallery_audio_arr[0]->name_show_var =  "Alexa Zelaya";
            $web_variable_std->gallery_audio_arr[0]->date_show_var =  "January 21";
            $web_variable_std->gallery_audio_arr[0]->image_show_var =  $public_path . "user_templates/" . $default_template . "/images/download.jpg";

            $web_variable_std->gallery_video_arr = [];
            $web_variable_std->gallery_video_arr[0] = new \stdClass();
            $web_variable_std->gallery_video_arr[0]->id = "1";
            $web_variable_std->gallery_video_arr[0]->user_id = "1";
            $web_variable_std->gallery_video_arr[0]->image_show_var =  $public_path . "user_templates/" . $default_template . "/images/download.jpg";


            $web_variable_std->slider_arr = [];
            $web_variable_std->slider_arr[0] = new \stdClass();
            $web_variable_std->slider_arr[0]->num_var = "137";
            $web_variable_std->slider_arr[0]->image_show_var =  $public_path . "user_templates/" . $default_template . "/images/download.jpg";


            $web_variable_std->story_arr = [];
            $web_variable_std->story_arr[0] = new \stdClass();
            $web_variable_std->story_arr[0]->user_id = "1";
            $web_variable_std->story_arr[0]->story_title_show_var =  "Story School";
            $web_variable_std->story_arr[0]->user_name_show_var =  "Alexa Zelaya";
            $web_variable_std->story_arr[0]->date_show_var =  "January 21";
            $web_variable_std->story_arr[0]->image_show_var = $public_path . "user_templates/" . $default_template . "/images/baby_cot.png";
            $web_variable_std->story_arr[0]->details_show_var =  "3rd floor of the library was always our go to if we wanted to study (aka gossip haha.) We shared so many nice chats here and always wanted to reservea study room but we were always too lazy to do that. We had find an empty onebut then get kicked out like 10 minutes later after someone who actuallyreserved it came in. All the memories at school hold a special place in myheart. I walk past the places we would hang out and think about everything.I am glad we went from high school to college. I am so grateful I got tospend my first quarter of college with someone as amazing as you, Anthony.";


            $web_variable_std->story_arr[1] = new \stdClass();
            $web_variable_std->story_arr[1]->user_id = "1";
            $web_variable_std->story_arr[1]->story_title_show_var =  "Story College";
            $web_variable_std->story_arr[1]->user_name_show_var =  " Zelaya";
            $web_variable_std->story_arr[1]->date_show_var =  "feb 21";
            $web_variable_std->story_arr[1]->image_show_var = $public_path . "user_templates/" . $default_template . "/images/baby_cot.png";
            $web_variable_std->story_arr[1]->details_show_var =  "10th floor of the library was always our go to if we wanted to study (aka gossip haha.) We shared so many nice chats here and always wanted to reservea study room but we were always too lazy to do that. We had find an empty onebut then get kicked out like 10 minutes later after someone who actuallyreserved it came in. All the memories at school hold a special place in myheart. I walk past the places we would hang out and think about everything.I am glad we went from high school to college. I am so grateful I got tospend my first quarter of college with someone as amazing as you, Anthony.";




            // $web_variable_std->story_arr = [];
            // $story_tab_std = new \stdClass();
            // $story_tab_std->user_id = "1";
            // $story_tab_std->story_title_show_var =  "Story School";
            // $story_tab_std->user_name_show_var =  "Alexa Zelaya";
            // $story_tab_std->date_show_var =  "January 21";
            // $story_tab_std->image_show_var = $public_path . "user_templates/" . $default_template . "/images/baby_cot.png";
            // $story_tab_std->details_show_var =  "3rd floor of the library was always our go to if we wanted to study (aka gossip haha.) We shared so many nice chats here and always wanted to reservea study room but we were always too lazy to do that. We had find an empty onebut then get kicked out like 10 minutes later after someone who actuallyreserved it came in. All the memories at school hold a special place in myheart. I walk past the places we would hang out and think about everything.I am glad we went from high school to college. I am so grateful I got tospend my first quarter of college with someone as amazing as you, Anthony.";
            // $web_variable_std->story_arr[0] = $story_tab_std;

            // $story_tab_std2 = new \stdClass();
            // $story_tab_std2->user_id = "1";
            // $story_tab_std2->story_title_show_var =  "Story College";
            // $story_tab_std2->user_name_show_var =  "Alexa Zelaya";
            // $story_tab_std2->date_show_var =  "Febuary 03";
            // $story_tab_std2->image_show_var = $public_path . "user_templates/" . $default_template . "/images/baby_cot.png";
            // $story_tab_std2->details_show_var =  "3rd floor of the library was always our go to if we wanted to study (aka gossip haha.) We shared so many nice chats here and always wanted to reservea study room but we were always too lazy to do that. We had find an empty onebut then get kicked out like 10 minutes later after someone who actuallyreserved it came in. All the memories at school hold a special place in myheart. I walk past the places we would hang out and think about everything.I am glad we went from high school to college. I am so grateful I got tospend my first quarter of college with someone as amazing as you, Anthony.";
            // $web_variable_std->story_arr[1] = $story_tab_std2;

            // "gallery_photo_htmlarr":"<div id=\"photo\" class=\"tab_galcontent\"> <div class=\"gall_top_bttn\"> <div class=\"flx\">  <div class=\"slidsho_txt\" > <label for=\"file_upload\" class=\"custom-file-upload\">  Add a Photo </label><input type=\"file\"  accept=\"image/*\" id=\"file_upload\" name=\"upld_file\" class=\"upld_file crop_upload_image\" image_width=\"378\" image_height=\"226\" aspect_ratio_width=\"16\" aspect_ratio_height=\"9\" upload_input_by_name=\"upld_file_hid\" ></div><div class=\"publish_btn\"><button id =\"save_media_image\"class=\"btn btn-danger\">Publish</button></div> </div> </div> <div class=\"gallery_img\"> <div class=\"row gall_row\"><div class=\"col-md-3 pic_gal_img\"> <img src=\"{!!{gallery_photo_arr.image_show_var}!!}\"   alt=\"\"></div> <div class=\"col-md-3 pic_gal_img\"> <img src=\"{!!{gallery_photo_arr.image_show_var}!!}\" alt=\"\"> </div> <div class=\"col-md-3 pic_gal_img\"> <img src=\"{!!{gallery_photo_arr.image_show_var}!!}\" alt=\"\"> </div> </div></div></div>",
            // "gallery_audio_htmlarr":"<div id=\"Audio\" class=\"tab_galcontent\"><div class=\"audio_icon\"><i class=\"fa fa-microphone\" aria-hidden=\"true\"></i></div><div class=\"add_audio\"> <div class=\"aud_head\"> Add Audio </div><div class=\"aud_box\"><label for=\"audio_upload\" class=\"custom-file-upload\"> <i class=\"fa fa-cloud-upload\" aria-hidden=\"true\"></i></label> <input type=\"file\" accept=\"audio/*\" id=\"file_upload\" id=\"audio_upload\" name=\"upld_aud\" class=\"upld_audio\" > <p>From Your Device</p> </div><div class=\"publishing_btn aud\"><button id =\"save_media_audio\"class=\"btn btn-danger\">Publish</button></div></div></div>",
            // "gallery_video_htmlarr":"<div id=\"video\" class=\"tab_galcontent\"> <div class=\"gall_top_bttn\"> <div class=\"flx\">  <div class=\"slidsho_txt\" > <label for=\"file_upload\" class=\"custom-file-upload\">  Add a Video </label><input type=\"file\"  accept=\"video/*\" id=\"file_upload\"  id=\"vid_upload\" name=\"upld_vid\" class=\"upld_video\" ></div> <div class=\"publish_btn\"><button id =\"save_media_video\"class=\"btn btn-danger\">Publish</button></div></div> </div><div class=\"gallery_video\"><div class=\"row\"><div class=\"col-md-3 pic_gal_img\"><img src=\"{!!{gallery_video_arr.image_show_var}!!}\"  alt=\"\"></div><div class=\"col-md-3 pic_gal_img\"><img src=\"{!!{gallery_video_arr.image_show_var}!!}\"  alt=\"\"></div><div class=\"col-md-3 pic_gal_img\"> <img src=\"{!!{gallery_video_arr.image_show_var}!!}\" alt=\"\"> </div></div> </div></div>",

            $style->web_variable = json_encode($web_variable_std);
            $style->variable_html = '';
            $style->save();

            $variable_html = '
            {
                "tributes_htmlarr":  "<div class=\"reviewBox tribute_append\" id=\"\"><ul class=\"reviewSection\"> <li><img src=\"{!!{tributes_arr.image_show_var}!!}\"></li> <li> <h3>{!!{tributes_arr.user_name_show_var}!!}</h3> <h5>{!!{tributes_arr.date_show_var}!!}</h5><p class=\"trib_para\">{!!{tributes_arr.details_show_var}!!}</p> </li></ul></div>",
                "story_htmlarr":  "<div class=\"story_tab\"><h3>{!!{story_arr.story_title_show_var}!!}</h3><p>{!!{story_arr.date_show_var}!!}. by{!!{story_arr.user_name_show_var}!!}</p> <img src=\"{!!{story_arr.image_show_var}!!}\" alt=\"relative\"><div class=\"story_para\"><p>{!!{story_arr.details_show_var}!!}</p><a class=\"shr_btn_md\" data-toggle=\"modal\" data-target=\"#inviteModal\"><div class=\"whole\"><div class=\"flx\"> <div class=\"share\"><i class=\"fa fa-share-alt-square\" aria-hidden=\"true\"></i> </div><div class=\"chr_p\"> Share</div></div></div></a></div></div>",
                "story_tab_htmlvar":"<div id=\"stories\" class=\"tabcontent\"> <div class=\"add_stor\"> <div class=\"flx\"><div class=\"container\"> <div class=\"row\"> <div class=\"col-md-8\"><p>Share a special moment from {!!{memorial_user_var.name_var}!!} ’s  life</p></div><div class=\"col-md-4\"><a href=\"#story_title\"><div class=\"stor_bttn\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>_Write a story </div></a></div></div></div></div></div><div class=\"story_blk\"> {!!{story_htmlarr}!!} </div><section class=\"story_add\"> <div class=\"contaiasner\"> <div class=\"row\"> <div class=\"share_story\"> <div class=\"heddd\"> <h2>Share a story</h2>  </div>  <div class=\"str_title\"> <input type=\"text\" class=\"form-control\" name=\"story_title_n\" id=\"story_title\" placeholder=\"Title (Optional)\">  </div>  <div class=\"str_textaea\"> <textarea class=\"form-control\" name=\"story_details_n\" rows=\"5\" id=\"story_details\"></textarea> </div>   <div class=\"attach\"> <div class=\"attch_hed\">  Attach a picture : </div><div class=\"attch_icon_area\"><div class=\"attch_icon\"><label for=\"upload-photo\"><i class=\"fa fa-cloud-upload\" aria-hidden=\"true\"></i></label> <input type=\"file\" id=\"upload-photo\" class=\"up_ld_file crop_upload_image\" image_width=\"378\" image_height=\"226\" aspect_ratio_width=\"16\" aspect_ratio_height=\"9\" upload_input_by_name=\"story_image\"><p>Upload From Your Device</p></div>  </div> </div> <div class=\"publ_btn\"> <button id=\"save_story\" class=\"btn btn-danger\">Publish</button> </div></div></div></div></section></div>",

                "recent_updates_show_htmlarr": "<ul><li class=\"no-img\"><i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i></li><li class=\"contentLi\">{!!{recent_updates_show_arr.message_var}!!}</li></ul><ul><li class=\"no-img\"><i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i></li><li class=\"contentLi_vid\">{!!{recent_updates_show_arr.message_var}!!}</li></ul><ul><li class=\"no-img\"><i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i></li><li class=\"contentLi_aud\">{!!{recent_updates_show_arr.message_var}!!}</li></ul><ul><li class=\"no-img\"><i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i></li><li class=\"contentLi_Pic\">{!!{recent_updates_show_arr.message_var}!!}</li></ul>",
                "recent_updates_show_htmlvar": "<div class=\" recent_area\">{!!{recent_updates_show_htmlarr}!!}</div>",
                
                
                "user_memorial_tribute_htmlvar": "<h3 class=\"about_heading\">Let the memory of {!!{memorial_user_var.name_var}!!} be with us forever.</h3><p><ul class=\"li_txt\"><li>Born on {!!{memorial_user_var.birth_var}!!} in {!!{memorial_user_var.city_var}!!}, {!!{memorial_user_var.country_var}!!}</li><li>Passed away on {!!{memorial_user_var.death_var}!!}</li></ul></p><div class=\"abt_txt\">{!!{tribute_text_var}!!} </div>",

                "about_tab_htmlvar": "<div id=\"About\" class=\"tabcontent\"> {!!{user_memorial_tribute_htmlvar}!!} <div class=\"tributes\"><h1>Tributes</h1><a href=\"#add_tibs\"><button class=\"bt_trei\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>_ Leave a Tribute</button></a></div> <div class=\"tribute_blk add_tribute_append\">{!!{tributes_htmlarr}!!}</div><div class=\"lev_tri\"><h3 id=\"tibutes_add\">Leave a Tribute</h3><div class=\"icon_list\"><div class=\"dropdown candle-select\"><button onclick=\"set_tribute(`candle`,`' . $public_path . 'user_templates/' . $default_template . '/images/imgs/candle.png' . '`)\" class=\"bt_no\"><div class=\"cand same\"><div class=\"ico_wri\"><img class=\"candle-select-icon-img\" src=\"{!!{icon_list_var.candel_image_var}!!}\" alt=\"relative\"><span class=\"sp\">Light a Candle</span></div></div> </button></div><div class=\"dropdown flower-select\"><button onclick=\"set_tribute(`flower`,`' . $public_path . 'user_templates/' . $default_template . '/images/imgs/flower.png' . '`)\" class=\"bt_no\"><div class=\"flower same\"><div class=\"ico_wri\"><img src=\"{!!{icon_list_var.flower_image_var}!!}\" alt=\"relative\"><span class=\"sp\">Lay a Flower</span></div></div></button></div><div class=\"dropdown feather-select\"><button onclick=\"set_tribute(`feather`,`' . $public_path . 'user_templates/' . $default_template . '/images/imgs/feather.png' . '`)\" class=\"bt_no\"><div class=\"feather same\"><div class=\"ico_wri\"><img src=\"{!!{icon_list_var.feather_image_var}!!}\" alt=\"relative\"><span class=\"sp\">Leave a Note</span></div></div></button></div><input type=\"hidden\" id=\"type_tribute\" name=\"type_tribute\"><input type=\"hidden\" id=\"image_tribute\" name=\"image_tribute\"></div><div class=\"txt_ara\"><textarea name=\"tribute\" id=\"add_tibs\" cols=\"86\" placeholder=\"Add your tribute here\"rows=\"6\"></textarea></div><div class=\"publish\"><button id=\"save_trib\" class=\"btn btn-danger pbbttn\">Publish</button> </div></div></div> ",



                "life_tab_htmlarr":"<div class=\"reviewBox\"><ul class=\"reviewSection\"><li><h3>{!!{memorial_user_var.name_var}!!}</h3></li></ul><div class=\"baby\"><img src=\"{!!{life_tab_arr.image_show_var}!!}\" alt=\"relative\"></div> <p class=\"fdgsdf\">{!!{life_tab_arr.details_show_var}!!}</p><a class=\"shr_btn_md\" data-toggle=\"modal\" data-target=\"#inviteModal\"><div class=\"whole\"><div class=\"flx\"> <div class=\"share\"><i class=\"fa fa-share-alt-square\" aria-hidden=\"true\"></i> </div><div class=\"chr_p\"> Share</div></div></div></a></div>",
                "life_tab_htmlvar":"<div id=\"Life\" class=\"tabcontent\">{!!{life_tab_htmlarr}!!}</div>",


                "gallery_photo_htmlarr":  "<div class=\"col-md-4 pic_gal_img remove_imgae{!!{gallery_photo_arr.id}!!}\"><div class=\"image-area_pic\"> <img src=\"{!!{gallery_photo_arr.image_show_var}!!}\"   alt=\"\"><a class=\"remove-image_pic\" onclick=\"delete_request( {!!{gallery_photo_arr.id}!!} )\" style=\"display: inline;\">&#215;</a></div></div>",
                "gallery_video_htmlarr":  "<div class=\"col-md-4 pic_gal_vid remove_vid`+ user_id +`\"><div class=\"image-area_pic\"><video width=\"200\" height=\"200\" controls=\"\"><source src=\"{!!{gallery_video_arr.image_show_var}!!}\" alt=\"\"></video><a class=\"remove-image_pic\" onclick=\"delete_request_vid(`+user_id+`)\"  style=\"display: inline;\">&#215;</a></div></div>",
                "gallery_audio_htmlarr":  "<div class=\"uploaded_audio_box\"><div class=\"image-area_pic\"><p>{!!{gallery_audio_arr.date_show_var}!!} .by {!!{gallery_audio_arr.name_show_var}!!}</p><audio autostart=\"0\" autostart=\"false\" preload =\"none\" controls ><source src=\"{!!{gallery_audio_arr.image_show_var}!!}\" type=\"audio/mpeg\" /></audio><a class=\"remove-image_pic\" href=\"#\" style=\"display: inline;\">&#215;</a></div></div>",


                "gallery_photo_tab_htmlvar":"<div id=\"photo\" class=\"tab_galcontent\"> <div class=\"gall_top_bttn\"> <div class=\"flx upld_file\">  <div class=\"slidsho_txt\" > <label for=\"file_upload\" class=\"custom-file-upload\">  Add a Photo </label><input type=\"file\"  accept=\"image/*\" id=\"file_upload\" name=\"upld_file\" class=\"upld_file crop_upload_image\" image_width=\"378\" image_height=\"226\" aspect_ratio_width=\"16\" aspect_ratio_height=\"9\" upload_input_by_name=\"upld_file_hid\" ></div><div class=\"publish_btn\"><button id =\"save_media_image\"class=\"btn btn-danger\">Publish</button></div> </div> </div> <div class=\"gallery_img\"> <div class=\"row gall_row\">{!!{gallery_photo_htmlarr}!!}</div></div></div>",
                "gallery_audio_tab_htmlvar":"<div id=\"Audio\" class=\"tab_galcontent\"><div class=\"uploaded_audio_area\">{!!{gallery_audio_htmlarr}!!}</div><div class=\"audio_icon\"><i class=\"fa fa-microphone\" aria-hidden=\"true\"></i></div><div class=\"add_audio\"> <div class=\"aud_head\"> Add Audio </div><div class=\"aud_box\"><label for=\"audio_upload\" class=\"custom-file-upload\"> <i class=\"fa fa-cloud-upload\" aria-hidden=\"true\"></i></label> <input type=\"file\" accept=\"audio/*\" id=\"file_upload\" id=\"audio_upload\" name=\"upld_aud\" class=\"upld_audio\" > <p>From Your Device</p> </div><div class=\"publishing_btn aud\"><button id =\"save_media_audio\"class=\"btn btn-danger\">Publish</button></div></div></div>",
                "gallery_video_tab_htmlvar":"<div id=\"video\" class=\"tab_galcontent\"> <div class=\"gall_top_bttn\"> <div class=\"flx upld_file\">  <div class=\"slidsho_txt\" > <label for=\"file_upload\" class=\"custom-file-upload\">  Add a Video </label><input type=\"file\"  accept=\"video/*\" id=\"file_upload\"  id=\"vid_upload\" name=\"upld_vid\" class=\"upld_video\" ></div> <div class=\"publish_btn\"><button id =\"save_media_video\"class=\"btn btn-danger\">Publish</button></div></div> </div><div class=\"gallery_video\"><div class=\"row vid_row\">{!!{gallery_video_htmlarr}!!} </div></div></div>",
                
                "slider_htmlarr": "<div class=\"item active\"><img src=\" {!!{slider_arr.image_show_var}!!}\" alt=\"responsive\"   style=\"width:100%; height: 100%;\"></div><div class=\"item\"><img src=\" {!!{slider_arr.image_show_var}!!}\"style=\"width:100%; height: 100%;\"></div><div class=\"item\"><img src=\" {!!{slider_arr.image_show_var}!!}\" style=\"width:100%; height: 100%;\"></div>",
                "slider_htmlvar": "{!!{slider_htmlarr}!!}"
                    }
            ';
            $style->variable_html = $variable_html;

            $style->save();
        }
    }
}
