<?php

namespace Database\Seeders;

use App\Models\Template;
use App\Models\WebsiteTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template_name = 'template_1';
        $template = WebsiteTemplate::where('name', $template_name)->first();
        if ($template) {
            $template->forceDelete();
        }

        // if (!$template) {
        $template = new WebsiteTemplate();
        // }
        $image_path = asset('public') . '/';
        $template->id = 1;
        $template->name = $template_name;
        $template->save();
        // if(){}
        // $public_path = 'https://4evermemorial.com/public/';
        // $public_path = 'https://stagging.hatinco.com/4_ever_memories/public/';
        // $public_path = 'https://stagging.hatinco.com/4_ever_memories/public/';
        // $public_path = 'http://localhost/4_ever_memories/public/';
        $public_path = Config::get('app.url') . '/public/';
        $url_path = Config::get('app.url') . '/';
        $template->web_html =
            '
        <html>

            <head>
                <title>4 Ever Memorial</title>
                <meta charset="utf-8" />
                <link rel="icon" type="image/png" sizes="16x16" href="' . $public_path . 'theme/user_theme/images/favicon.png">
                <meta name="viewport" content="width=device-width, initiam/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <link rel="stylesheet" type="text/css"
                    href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
                <link rel="stylesheet" id="template_css_link" href="" />
                <link rel="stylesheet" href="{!!{memorial_style_var.style_script_var}!!}" />
                <link rel="stylesheet" href="' . $public_path . 'user_templates/common.css" />
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
                <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            </head>

            <body>
                <section class="nav_back">
               
                    <div class="nav_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="logo-area">
                                    <img src="' . $public_path . 'user_templates/template_1/images/logo.png" alt="relative" />
                                    </div>
                                </div>
                                <div class="col-md-9 hidden-xs">
                                <div class="nav_bar">
                                <a href="' . $url_path . 'user/memorialform">CREATE A NEW MEMORIAL</a>
                                <a href="' . $url_path . 'user/aboutus">ABOUT US</a>
                                <a href="' . $url_path . 'user/contactus">CONTACT SUPPORT</a>
                                <i class="fa signin" style="display: none;" aria-hidden="true" data-toggle="modal" data-target="#LoginModalCenter"> SIGNIN</i>
                                <i class="fa fa-user-circle-o" style="display: none;" aria-hidden="true"><a href="' . $url_path . 'user/logout" > LogOut </a></i>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="cover_head">
                                    <h1>{!!{memorial_user_var.full_name_var}!!}</h1>
                                    <h1>{!!{memorial_user_var.birth_var}!!} - {!!{memorial_user_var.death_var}!!}</h1>
                                </div>
                            </div>
                            <div class="col-md-4 prf_img">
                                <div class="profile_img">
                                <img src="' . $public_path . 'user_templates/template_1/images/profile_pic.jpg" alt="relative" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="tab_backg"></div>
                    <div class="back_sec">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="tab_area">
                                        <div class="tab tab_backg">
                                            <button class="tablinks" onclick="openCity(event, \'About\')" id="defaultOpen">
                                                ABOUT
                                            </button>
                                            <button class="tablinks" onclick="openCity(event, \'Life\')">
                                                LIFE
                                            </button>
                                            <button class="tablinks" onclick="openCity(event, \'Gallary\'); openpic(event, \'photo\'); set_media(\'photo\');">
                                                GALLERY
                                            </button>
                                            <button class="tablinks" onclick="openCity(event, \'stories\')">
                                                STORIES
                                            </button>
                                            
                                        </div>
                                        {!!{about_tab_htmlvar}!!}



                                        {!!{life_tab_htmlvar}!!}


                                        <div id="Gallary" class="tabcontent">
                                            <div class="reviewBox">

                                                <div class="tab_gal">
                                                    <button class="tab_gallinks photo_btn" onclick="openpic(event, \'photo\'); set_media(\'photo\');"  id="defaultOpen">photo</button>
                                                    <button class="tab_gallinks video_btn" onclick="openpic(event, \'video\'); set_media(\'video\');">video</button>
                                                    <button class="tab_gallinks audio_btn" onclick="openpic(event, \'Audio\'); set_media(\'audio\');">Audio</button>
                                                </div>
                                                <input type="hidden" id="media_type" name="media_type">
                                                {!!{gallery_photo_tab_htmlvar}!!}
                                                {!!{gallery_audio_tab_htmlvar}!!}
                                                {!!{gallery_video_tab_htmlvar}!!}



                                            </div>
                                        </div>
                                        {!!{story_tab_htmlvar}!!}



                                    </div>
                                </div>
                                <div class="col-md-4 side_area">
                                    <div class="rightBoxArea familyFriend">
                                        <ul>
                                            <li>
                                                <h3>Invite {!!{memorial_user_var.name_var}!!}\'s family and friends</h3>
                                            </li>
                                            <li><i class="fa fa-user-plus" aria-hidden="true"></i></li>
                                        </ul>
                                        <a  class="btn btn-primary btnInvite" data-toggle="modal" data-target="#inviteModal"><i class="fa fa-user-plus"
                                                aria-hidden="true"></i> Invite Now</a>
                                    </div>
                                    <div class="face_share">
                                    <div class="fb_icon">
                                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                    </div>
                                    <div class="fb_share_par">
                                        <?php $url = "' . $url_path . '/user/get_memorial/asdsadsad@forevermemorial.com"; ?>
                                        <a class="facebook-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>">Share on Facebook</a>
                                    </div>
                                </div>
                                
                                    <div class="phots">
                                        <p class="pht_para">137 Photos</p>
                                        <div class="imag_sec">
                                        <div class="contain side_slider">
                                    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                                      

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                        {!!{slider_htmlvar}!!}
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                        </div>
                                    </div>
                                    <div class="rightBoxArea RecentUpdate">
                                        <h3>Recent updates</h3>
                                        {!!{recent_updates_show_htmlvar}!!}
                                    </div>
                                    
                                    <div class="view_sec">
                                        <div class="flx">
                                            <div class="viw_icon">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </div>
                                            <div class="viw_para">
                                                {!!{total_views_var}!!} Views
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                <section class="footer_area">
                    <div class="container-fluid">
                        <div class="row hidden-xs">
                            <div class="col-md-4">
                                <div class="sdad">
                                    <h5 class="sdads">Follow us:</h5>
                                    <div class="social">
                                       <a class="link_socl" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                       <a class="link_socl" href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="links">

                                    <a href="' . $url_path . 'search/memorialss">Memorial Websites</a>
                                    <a href="' . $url_path . 'user/service_term">Terms of Use</a>
                                    <a href="' . $url_path . 'user/privacy_policy">Privacy Policy</a>
                                    <a href="' . $url_path . 'user/contactus">Contact Us</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
                </section>
                <a href="#" class="float">
                    <i class="fa fa-chevron-up my-float" aria-hidden="true"></i>
                </a>
     
  <!-- The Modal -->
  <div class="modal fade" id="inviteModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Invite Family and Friends</h4>
          <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
         <form action="">
            <div class="form-group">
              <label for="usr">Enter Email:</label>
              <input type="text" placeholder="example@mail.com,example2@mail.com,example3@mail.com......" class="form-control share_inveite_emails" id="usr" name="invite_email">
            </div>
            <button type="button" class="btn btn-primary email_sub sumit_email">Submit</button>
          </form>          
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal -->

  <!-- Error Modal -->
  <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="errorModalLabel">Error</h4>
              </div>
              <div class="modal-body">
                  <p id="errorText"></p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Error Modal -->
  <div class="modal fade" id="success_Modal">
  <div class="modal-dialog">
      <div class="modal-content">

          <!-- Modal Header -->
          

          <!-- Modal body -->
          <div class="modal-body">
              <div class="icon_tick">
                  <i class="fa fa-check" aria-hidden="true"></i>
              </div>
              <div class="inite_Succ_hed">
                 Success
              </div>
              <div class="inite_Succ_txt">
                 An Invitation Has Been Sent Successfully.
              </div>
              <div class="mdl_btn">
                  <button class="btn btn-primary" data-dismiss="modal">OK</button>
              </div>
          </div>



      </div>
  </div>
</div>


</body>
            <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].classList.remove("active"); // Remove "active" class from all tablinks
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.classList.add("active"); // Add "active" class to the clicked tablink
            }
            document.getElementById("defaultOpen").click();
        </script>
        
        <script>
            function openpic(evt, cityName) {
                var i, tab_galcontent, tab_gallinks;
                tab_galcontent = document.getElementsByClassName("tab_galcontent");
                for (i = 0; i < tab_galcontent.length; i++) {
                    tab_galcontent[i].style.display = "none";
                }
                tab_gallinks = document.getElementsByClassName("tab_gallinks");
                for (i = 0; i < tab_gallinks.length; i++) {
                    tab_gallinks[i].classList.remove("active"); // Remove "active" class from all tab_gallinks
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.classList.add("active"); // Add "active" class to the clicked tab_gallink
            }
            document.getElementById("defaultOpen").click();
        </script>
        

            </html>


        ';
        $template->save();
        $template = WebsiteTemplate::where('name', $template_name)->first();
        //     $web_variable = '
        //     {
        //         "owner_user_var": {
        //             "id": "03",
        //             "name_var": "Anthony",
        //             "full_name_var": "Anthony Joseph Bouslaiby",
        //             "birth_var": "2004",
        //             "death_var": "2022",
        //             "father_name_var": "Anthony Father",
        //             "image_var": "' . $public_path . 'user_templates/template_1/images/profile_pic.jpg"
        //         },
        //         "total_views_var": 90,
        //         "recent_updates_show_arr": [{
        //                 "date_var": "February 2",
        //                 "type_var": "tribute",
        //                 "number_var": 1,
        //                 "message_var": "added 1 tribute"
        //             },
        //             {
        //                 "date_var": "February 3",
        //                 "type_var": "photos",
        //                 "number_var": 3,
        //                 "message_var": "added 3 photos"
        //             },
        //             {
        //                 "date_var": "February 4",
        //                 "type_var": "tribute",
        //                 "number_var": 2,
        //                 "message_var": "added 2 tributes"
        //             }
        //         ],
        //         "icon_list_var": {

        //             "flower_image_var": "' . $public_path . 'user_templates/template_1/images/imgs/flower.png",
        //             "candel_image_var": "' . $public_path . 'user_templates/template_1/images/imgs/candle.png",
        //             "feather_image_var": "' . $public_path . 'user_templates/template_1/images/imgs/feather.png"
        //         },
        //         "memorial_user_var": {
        //             "id": "03",
        //             "name_var": "Anthony",
        //             "full_name_var": "Anthony Joseph Bouslaiby",
        //             "birth_var": "2004",
        //             "death_var": "2022",
        //             "father_name_var": "Anthony Father",
        //             "image_var": "' . $public_path . 'user_templates/template_1/images/profile_pic.jpg"
        //         },
        //         "memorial_style_var": {
        //             "style_script_var": "' . $public_path . 'user_templates/template_1/css/style.css"
        //         },
        //         "tributes_arr": [{
        //                 "user_name_show_var": "Maria Nashed",
        //                 "type_var": "flower",
        //                 "date_show_var": "January 23",
        //                 "details_show_var": "Anthony was an amazingly sweet friend. After class he would always walk me to my car and then I would drive him to his. We would always have a good time laughing at the way we pronounced Arabic words due to difference in dialect even though he knew little-to-no Arabic at all lol. I also remember how whenever I would ask for help on homework, he would always insist on teaching me how to do the problems fully in order for me to better.",
        //                 "date_var": "23/01/1990",
        //                 "image_show_var": "' . $public_path . 'user_templates/template_1/images/imgs/flower.png"
        //             },
        //             {
        //                 "user_id": 1,
        //                 "image_show_var": "' . $public_path . 'user_templates/template_1/images/imgs/candle.png",
        //                 "user_name_show_var": "Norice Mazmanian",
        //                 "type_var": "candle",
        //                 "date_show_var": "January 22",
        //                 "details_show_var": "I remember one day after my bone marrow transplant. I was staying at my daughters house while recovering. I think my daughter had to go out and all of a sudden Anthony came to my room and pulled up a chair. No doubt he was told to make sure I didnot get out of bed. Anyway we started talking and I asked him about school and what he was learning. I think it was some scientific thing that he started explaining to me.",
        //                 "date_var": "23/01/1993"
        //             },
        //             {
        //                 "user_id": 1,
        //                 "image_show_var": "' . $public_path . 'user_templates/template_1/images/imgs/candle.png",
        //                 "user_name_show_var": "Adriana Villarreal",
        //                 "type_var": "candle",
        //                 "date_show_var": "January 21",
        //                 "details_show_var": "Anthony was such a kind person he never made me feel left out nor ever judged me.",
        //                 "date_var": "21/01/1995"
        //             },
        //             {
        //                 "user_id": 1,
        //                 "image_show_var": "' . $public_path . 'user_templates/template_1/images/imgs/candle.png",
        //                 "user_name_show_var": "Norice Mazmanian",
        //                 "type_var": "candle",
        //                 "date_show_var": "January 22",
        //                 "details_show_var": "Anthony was always precocious and asked every question ever. I loved his need to know more and more and to question. He always made me laugh. My favorite memories are long conversations with him. He could talk. And was so interesting. He was sweet and generous to everyone. He loved being in charge of projects and got any job done always wanting to do more. I miss his voice and laugh and \" yo, Mrs Johnson! You vibing?\" Anthony you will remain in my heart forever.",
        //                 "date_var": "21/01/1997"
        //             }
        //         ],
        //         "life_tab_arr": [{
        //             "user_id": 1,
        //             "image_show_var": "' . $public_path . 'user_templates/template_1/images/baby_cot.png",
        //             "details_show_var": "Anthony was born in September 1, 2004 via scheduled C-section at San Dimas Community Hospital in San Dimas. He was 8 lbs 10 oz..."
        //         }],
        //         "gallery_photo_arr": [{
        //             "user_id": 1,
        //             "image_show_var": "' . $public_path . 'user_templates/template_1/images/download.jpg"
        //         }],
        //         "gallery_audio_arr": [{
        //             "user_id": 1,
        //             "image_show_var": "' . $public_path . 'user_templates/template_1/images/download.jpg"
        //         }],
        //         "gallery_video_arr": [{
        //             "user_id": 1,
        //             "image_show_var": "' . $public_path . 'user_templates/template_1/images/download.jpg"
        //         }],
        //         "slider_arr": [{
        //             "num_var": 137,
        //             "image_show_var": "' . $public_path . 'user_templates/template_1/images/download.jpg"
        //         }],
        //         "story_tab_arr": [{
        //             "user_id": 1,
        //             "story_title_show_var": "Story Title",
        //             "user_name_show_var": "Alexa Zelaya",
        //             "date_show_var": "January 21",
        //             "image_show_var": "' . $public_path . 'user_templates/template_1/images/baby_cot.png",
        //             "details_show_var": "3rd floor of the library was always our go to if we wanted to study (aka gossip haha.) We shared so many nice chats here and always wanted to reservea study room but we were always too lazy to do that. We had find an empty onebut then get kicked out like 10 minutes later after someone who actuallyreserved it came in. All the memories at school hold a special place in myheart. I walk past the places we would hang out and think about everything.I am glad we went from high school to college. I am so grateful I got tospend my first quarter of college with someone as amazing as you, Anthony."

        //         }]
        //     }
        //     ';
        // $template->web_variable = $web_variable;
        $template->web_variable = '';
        $template->save();
        $template = WebsiteTemplate::where('name', $template_name)->first();

        // $variable_html = '
        // {
        //     "tributes_htmlarr":  "<div class=\"reviewBox\"><ul class=\"reviewSection\"> <li><img src=\"{!!{tributes_arr.image_show_var}!!}\"></li> <li> <h3>{!!{tributes_arr.user_name_show_var}!!}</h3> <h5>{!!{tributes_arr.date_show_var}!!}</h5><p>{!!{tributes_arr.details_show_var}!!}</p> </li></ul></div>",
        //     "recent_updates_show_htmlarr": "<h5>{!!{recent_updates_show_arr.date_var}!!}</h5><ul><li class=\"no-img\"><i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i></li><li class=\"contentLi\">{!!{recent_updates_show_arr.message_var}!!}</li></ul>",
        //     "user_memorial_tribute_htmlvar": "<h3 class=\"about_heading\">Let the memory of {!!{memorial_user_var.name_var}!!} be with us forever.</h3><p><ul class=\"li_txt\"><li>18 years old</li><li>Born on September 1, 2004 in San Dimas, California, United States</li><li>Passed away on December 11, 2022 in United States</li></ul></p><p class=\"abt_txt\">This memorial website was created in memory of our beloved son,Anthony Bouslaiby, 18 years old, born on September 1, 2004, and passed away onDecember 11, 2022. He will be with us forever, and we will never stop loving him. Idecided to start this website to celebrate his life. Even though he wasnt with us as long as he shouldve been, he has touched so many lives and was so loved. I hope you all will contribute to this page, with picture, videos, and stories_arr. I was so touched by all the memories left in the memory jar at the luncheon. Please feel free to add more, as they may come to you, because thats all we have left once a loved one leaves us. We all appreciate the love you showed Anthony for however long you may have known him. Thank you all!<br> Angela (his mom) <br> P.S. Please let me know if you have any probelms uploading etc. You can click on a  photo to see the caption. </p>",
        //     "about_tab_htmlvar": "<div id=\"About\" class=\"tabcontent\"> {!!{user_memorial_tribute_htmlvar}!!} <div class=\"tributes\"><h1>Tributes</h1><button class=\"bt_trei\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>_ Leave a Tribute</button></div> <div class=\"tribute_blk\">{!!{tributes_htmlarr}!!}</div><div class=\"lev_tri\"><h3>Leave a Tribute</h3><div class=\"icon_list\"><div class=\"cand same\"><div class=\"ico_wri\"><img src=\"{!!{icon_list_var.candel_image_var}!!}\" alt=\"relative\"><span class=\"sp\">Light a Candle</span></div></div> <div class=\"flower same\"><div class=\"ico_wri\"><img src=\"{!!{icon_list_var.flower_image_var}!!}\" alt=\"relative\"><span class=\"sp\">Lay a Flower</span></div></div><div class=\"feather same\"><div class=\"ico_wri\"><img src=\"{!!{icon_list_var.feather_image_var}!!}\" alt=\"relative\"><span class=\"sp\">Leave a Note</span></div></div></div><div class=\"txt_ara\"><textarea name=\"tribute\" id=\"\" cols=\"86\" placeholder=\"Add your tribute here\"rows=\"6\"></textarea></div><div class=\"publish\"><button class=\"btn btn-danger pbbttn\">Publish</button> </div> </div> </div>",
        //     "life_tab_htmlarr":"<div id=\"Life\" class=\"tabcontent\"><div class=\"reviewBox\"><ul class=\"reviewSection\"><li><h3>{!!{memorial_user_var.name_var}!!}’s Birth</h3></li></ul><div class=\"baby\"><img src=\"{!!{life_tab_arr.image_show_var}!!}\" alt=\"relative\"></div> <p class=\"fdgsdf\">{!!{life_tab_arr.details_show_var}!!}</p><div class=\"whole\"><div class=\"flx\"><div class=\"share\"><i class=\"fa fa-share-alt-square\" aria-hidden=\"true\"></i></div><div class=\"chr_p\">Share</div></div></div></div></div>",

        //     "gallery_photo_htmlarr":"<div id=\"photo\" class=\"tab_galcontent\"> <div class=\"flx\"> <div class=\"gall_top_bttn\"> <div class=\"flx\"> <div class=\"ply_bttn\"> <i class=\"fa fa-play-circle\" aria-hidden=\"true\"></i></div> <div class=\"slidsho_txt\"> <p>Start slideshow</p>  </div> </div>  </div><div class=\"gall_top_bttn\"> <div class=\"flx\"><div class=\"ply_bttn\"> <i class=\"fa fa-plus-square-o\" aria-hidden=\"true\"></i></div><div class=\"slidsho_txt\"><p>Add a Photo</p></div></div></div></div> <div class=\"gallery\"> <div class=\"col-md-3 pic_gal_img\"> <img src=\"{!!{gallery_photo_arr.image_show_var}!!}\"   alt=\"\"></div> <div class=\"col-md-3 pic_gal_img\"> <img src=\"{!!{gallery_photo_arr.image_show_var}!!}\" alt=\"\"> </div> <div class=\"col-md-3 pic_gal_img\"> <img src=\"{!!{gallery_photo_arr.image_show_var}!!}\" alt=\"\"> </div> </div></div>",
        //     "gallery_audio_htmlarr":"<div id=\"Audio\" class=\"tab_galcontent\"><div class=\"audio_icon\"><i class=\"fa fa-microphone\" aria-hidden=\"true\"></i></div><div class=\"add_audio\"><div class=\"aud_head\">Add Audio</div> <div class=\"aud_box\"><i class=\"fa fa-cloud-upload\" aria-hidden=\"true\"></i><p>From Your Device</p> </div></div></div>",
        //     "gallery_video_htmlarr":"<div id=\"video\" class=\"tab_galcontent\"> <div class=\"flx\"> <div class=\"gall_top_bttn\"><div class=\"flx\"><div class=\"ply_bttn\"><i class=\"fa fa-plus-square-o\" aria-hidden=\"true\"></i> </div><div class=\"slidsho_txt\"><p>Add Video</p></div> </div></div></div><div class=\"gallery\"><div class=\"col-md-3 pic_gal_img\"><img src=\"{!!{gallery_video_arr.image_show_var}!!}\"  alt=\"\"></div><div class=\"col-md-3 pic_gal_img\"><img src=\"{!!{gallery_video_arr.image_show_var}!!}\"  alt=\"\"></div><div class=\"col-md-3 pic_gal_img\"> <img src=\"{!!{gallery_video_arr.image_show_var}!!}\" alt=\"\"> </div> </div></div>",
        //     "story_tab_htmlarr":"<div id=\"stories\" class=\"tabcontent\"> <div class=\"add_stor\"> <div class=\"flx\"><div class=\"container\"> <div class=\"row\"> <div class=\"col-md-8\"><p>Share a special moment from {!!{memorial_user_var.name_var}!!} ’s  life</p></div><div class=\"col-md-4\"><div class=\"stor_bttn\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>_Write a story </div></div></div></div></div></div> <div class=\"story_blk\"><div class=\"story_tab\"><h3>{!!{story_tab_arr.story_title_show_var}!!}</h3><p>{!!{story_tab_arr.date_show_var}!!}. by{!!{story_tab_arr.user_name_show_var}!!}</p> <img src=\"{!!{story_tab_arr.image_show_var}!!}\" alt=\"relative\"><div class=\"story_para\"><p>{!!{story_tab_arr.details_show_var}!!}</p><div class=\"whole\"><div class=\"flx\"><div class=\"share\"><i class=\"fa fa-share-alt-square\" aria-hidden=\"true\"></i></div><div class=\"chr_p\">Share</div></div></div></div></div></div> <section class=\"story_add\"> <div class=\"contaiasner\"> <div class=\"row\"> <div class=\"share_story\"> <div class=\"heddd\"> <h2>Share a story</h2>  </div>  <div class=\"str_title\"> <input type=\"text\" class=\"form-control\" name=\"story_title_n\" id=\"story_title\" placeholder=\"Title (Optional)\">  </div>  <div class=\"str_textaea\"> <textarea class=\"form-control\" name=\"story_details_n\" rows=\"5\" id=\"story_details\"></textarea> </div>  <div class=\"by\"> <div class=\"dropdown\"> by ameer maavia<button class=\"dpbtn dropdown-toggle\" type=\"button\"  data-toggle=\"dropdown\">Change<span class=\"\"></span></button> <ul class=\"dropdown-menu dp_menue\"> <li><a href=\"#\">I am the author </a></li> <li><a href=\"#\">Posting on behalf of another person</a></li> </ul> </div> </div> <div class=\"attach\"> <div class=\"attch_hed\">  Attach a picture : </div><div class=\"attch_icon_area\"><div class=\"attch_icon\"><label for=\"upload-photo\"><i class=\"fa fa-cloud-upload\" aria-hidden=\"true\"></i></label> <input type=\"file\" name=\"photo\" id=\"upload-photo\" class=\"up_ld_file\" /><p>Upload From Your Device</p></div>  </div> </div> <div class=\"publ_btn\"> <button id=\"save_story\" class=\"btn btn-danger\">Publish</button> </div></div></div></div></section></div>",
        //     "slider_htmlarr": "<div class=\"item active\"><img src=\" {!!{slider_arr.image_show_var}!!}\" alt=\"responsive\"   style=\"width:100%; height: 100%;\"></div><div class=\"item\"><img src=\" {!!{slider_arr.image_show_var}!!}\"style=\"width:100%; height: 100%;\"></div><div class=\"item\"><img src=\" {!!{slider_arr.image_show_var}!!}\" style=\"width:100%; height: 100%;\"></div>"
        //         }
        // ';
        // $template->variable_html = $variable_html;
        $template->variable_html = '';

        $template->save();
    }
}
