
<html>

            <head>
                <title>4 Ever Memorial</title>
                <meta charset="utf-8" />
                <link rel="icon" type="image/png" sizes="16x16" href="{!!$base_url!!}/public/theme/user_theme/images/favicon.png">
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
                <link rel="stylesheet" href="{!! asset('public/user_templates/template_2/css/style.css') !!}" />
                <link rel="stylesheet" href="{!! asset('public/user_templates/common.css') !!}" />
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
                <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            </head>

            <body>
                <section class="nav_back">
                <style>
                .nav_back {
        background-image: url("{!!$base_url!!}/public/user_templates/template_1/images/cover.png");
    }
            </style>
                    <div class="nav_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="logo-area">
                                    <img src="{!!$base_url!!}/public/user_templates/template_1/images/logo.png" alt="relative" />
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="nav_bar">
                                    <a href="{!!$base_url!!}/user/memorialform">CREATE A NEW WEBSITE</a>
                                    <a href="{!!$base_url!!}/user/aboutus">ABOUT US</a>
                                    <a href="{!!$base_url!!}/user/contactus">CONTACT SUPPORT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="cover_head">
                                    <h1>adam albert jacob</h1>
                                    <h1>2023-08-09 - 2023-08-31</h1>
                                </div>
                            </div>
                            <div class="col-md-4 prf_img">
                                <div class="profile_img">
                                <img src="{!!$base_url!!}/public/user_templates/template_1/images/profile_pic.jpg" alt="relative" />
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
                                        <div class="tab">
                                            <button class="tablinks" onclick="openCity(event, 'About')" id="defaultOpen">
                                                ABOUT
                                            </button>
                                            <button class="tablinks" onclick="openCity(event, 'Life')">
                                                LIFE
                                            </button>
                                            <button class="tablinks" onclick="openCity(event, 'Gallary'); openpic(event, 'photo'); set_media('photo');">
                                                GALLERY
                                            </button>
                                            <button class="tablinks" onclick="openCity(event, 'stories')">
                                                STORIES
                                            </button>
                                        </div>
                                        <div id="About" class="tabcontent"> <h3 class="about_heading">Let the memory of adam be with us forever.</h3><p><ul class="li_txt"><li>Born on 2023-08-09 in London, England</li><li>Passed away on 2023-08-31</li></ul></p><div class="abt_txt"><p>he was a very good person</p> </div> <div class="tributes"><h1>Tributes</h1><a href="#add_tibs"><button class="bt_trei"><i class="fa fa-pencil" aria-hidden="true"></i>_ Leave a Tribute</button></a></div> <div class="tribute_blk add_tribute_append"><div class="reviewBox tribute_append" id=""><ul class="reviewSection"> <li><img src="{!!$base_url!!}/public/user_templates/images/candles/4.png"></li> <li> <h3>adam</h3> <h5> 22nd  August 2023</h5><p class="trib_para">he was a good person</p> </li></ul></div></div><div class="lev_tri"><h3 id="tibutes_add">Leave a Tribute</h3><div class="icon_list"><div class="dropdown candle-select"><button onclick="set_tribute(`candle`,`{!!$base_url!!}/public/user_templates/template_1/images/imgs/candle.png`)" class="bt_no"><div class="cand same"><div class="ico_wri"><img class="candle-select-icon-img" src="{!!$base_url!!}/public/user_templates/template_1/images/imgs/candle.png" alt="relative"><span class="sp">Light a Candle</span></div></div> </button></div><div class="dropdown flower-select"><button onclick="set_tribute(`flower`,`{!!$base_url!!}/public/user_templates/template_1/images/imgs/flower.png`)" class="bt_no"><div class="flower same"><div class="ico_wri"><img src="{!!$base_url!!}/public/user_templates/template_1/images/imgs/flower.png" alt="relative"><span class="sp">Lay a Flower</span></div></div></button></div><div class="dropdown feather-select"><button onclick="set_tribute(`feather`,`{!!$base_url!!}/public/user_templates/template_1/images/imgs/feather.png`)" class="bt_no"><div class="feather same"><div class="ico_wri"><img src="{!!$base_url!!}/public/user_templates/template_1/images/imgs/feather.png" alt="relative"><span class="sp">Leave a Note</span></div></div></button></div><input type="hidden" id="type_tribute" name="type_tribute"><input type="hidden" id="image_tribute" name="image_tribute"></div><div class="txt_ara"><textarea name="tribute" id="add_tibs" cols="86" placeholder="Add your tribute here"rows="6"></textarea></div><div class="publish"><button id="save_trib" class="btn btn-danger pbbttn">Publish</button> </div></div></div> 



                                        <div id="Life" class="tabcontent"><div class="reviewBox"><ul class="reviewSection"><li><h3></h3></li></ul><div class="baby"><img src="{!!$base_url!!}/public/images/64e4e0c3d5168.png" alt="relative"></div> <p class="fdgsdf"><p>he was a very good person</p></p><div class="whole"><div class="flx"><div class="share"><i class="fa fa-share-alt-square" aria-hidden="true"></i></div><div class="chr_p">Share</div></div></div></div></div>


                                        <div id="Gallary" class="tabcontent">
                                            <div class="reviewBox">

                                                <div class="tab_gal">
                                                    <button class="tab_gallinks photo_btn" onclick="openpic(event, 'photo'); set_media('photo');"  id="defaultOpen">photo</button>
                                                    <button class="tab_gallinks video_btn" onclick="openpic(event, 'video'); set_media('video');">video</button>
                                                    <button class="tab_gallinks audio_btn" onclick="openpic(event, 'Audio'); set_media('audio');">Audio</button>
                                                </div>
                                                <input type="hidden" id="media_type" name="media_type">
                                                <div id="photo" class="tab_galcontent"> <div class="gall_top_bttn"> <div class="flx upld_file">  <div class="slidsho_txt" > <label for="file_upload" class="custom-file-upload">  Add a Photo </label><input type="file"  accept="image/*" id="file_upload" name="upld_file" class="upld_file crop_upload_image" image_width="378" image_height="226" aspect_ratio_width="16" aspect_ratio_height="9" upload_input_by_name="upld_file_hid" ></div><div class="publish_btn"><button id ="save_media_image"class="btn btn-danger">Publish</button></div> </div> </div> <div class="gallery_img"> <div class="row gall_row"><div class="col-md-4 pic_gal_img remove_imgae"><div class="image-area_pic"> <img src="{!!$base_url!!}/public/images/64e5ba4193a5f.png"   alt=""><a class="remove-image_pic" style="display: inline;">&#215;</a></div></div><div class="col-md-4 pic_gal_img remove_imgae"><div class="image-area_pic"> <img src="{!!$base_url!!}/public/images/64e4ebc21e275.png"   alt=""><a class="remove-image_pic"  style="display: inline;">&#215;</a></div></div></div></div></div>
                                                <div id="Audio" class="tab_galcontent"><div class="uploaded_audio_area"><div class="uploaded_audio_box"><div class="image-area_pic"><p> 22nd  August 2023 .by adam</p><audio autostart="0" autostart="false" preload ="none" controls ><source src="{!!$base_url!!}/public/images/upload_file/1692724060.mp3" type="audio/mpeg" /></audio><a class="remove-image_pic" href="#" style="display: inline;">&#215;</a></div></div></div><div class="audio_icon"><i class="fa fa-microphone" aria-hidden="true"></i></div><div class="add_audio"> <div class="aud_head"> Add Audio </div><div class="aud_box"><label for="audio_upload" class="custom-file-upload"> <i class="fa fa-cloud-upload" aria-hidden="true"></i></label> <input type="file" accept="audio/*" id="file_upload" id="audio_upload" name="upld_aud" class="upld_audio" > <p>From Your Device</p> </div><div class="publishing_btn aud"><button id ="save_media_audio"class="btn btn-danger">Publish</button></div></div></div>
                                                <div id="video" class="tab_galcontent"> <div class="gall_top_bttn"> <div class="flx upld_file">  <div class="slidsho_txt" > <label for="file_upload" class="custom-file-upload">  Add a Video </label><input type="file"  accept="video/*" id="file_upload"  id="vid_upload" name="upld_vid" class="upld_video" ></div> <div class="publish_btn"><button id ="save_media_video"class="btn btn-danger">Publish</button></div></div> </div><div class="gallery_video"><div class="row vid_row"><div class="col-md-4 pic_gal_vid remove_vid`+ user_id +`"><div class="image-area_pic"><video width="200" height="200" controls=""><source src="{!!$base_url!!}/public/images/upload_file/1692724078.mp4" alt=""></video><a class="remove-image_pic" onclick="delete_request_vid(`+user_id+`)"  style="display: inline;">&#215;</a></div></div><div class="col-md-4 pic_gal_vid remove_vid`+ user_id +`"><div class="image-area_pic"><video width="200" height="200" controls=""><source src="{!!$base_url!!}/public/images/upload_file/1692724050.mp4" alt=""></video><a class="remove-image_pic" onclick="delete_request_vid(`+user_id+`)"  style="display: inline;">&#215;</a></div></div> </div></div></div>



                                            </div>
                                        </div>
                                        <div id="stories" class="tabcontent"> <div class="add_stor"> <div class="flx"><div class="container"> <div class="row"> <div class="col-md-8"><p>Share a special moment from adam ’s  life</p></div><div class="col-md-4"><a href="#story_title"><div class="stor_bttn"><i class="fa fa-pencil" aria-hidden="true"></i>_Write a story </div></a></div></div></div></div></div><div class="story_blk"> <div class="story_tab"><h3>he had a wonderful story</h3><p> 22nd  August 2023. byadam</p> <img src="{!!$base_url!!}/public/images/64e4e27d934e0.png" alt="relative"><div class="story_para"><p>he had a wonderful story</p><div class="whole"><div class="flx"><div class="share"><i class="fa fa-share-alt-square" aria-hidden="true"></i></div><div class="chr_p">Share</div></div></div></div></div> </div><section class="story_add"> <div class="contaiasner"> <div class="row"> <div class="share_story"> <div class="heddd"> <h2>Share a story</h2>  </div>  <div class="str_title"> <input type="text" class="form-control" name="story_title_n" id="story_title" placeholder="Title (Optional)">  </div>  <div class="str_textaea"> <textarea class="form-control" name="story_details_n" rows="5" id="story_details"></textarea> </div>  <div class="by"> <div class="dropdown"> by ameer maavia<button class="dpbtn dropdown-toggle" type="button"  data-toggle="dropdown">Change<span class=""></span></button> <ul class="dropdown-menu dp_menue"> <li><a href="#">I am the author </a></li> <li><a href="#">Posting on behalf of another person</a></li> </ul> </div> </div> <div class="attach"> <div class="attch_hed">  Attach a picture: </div><div class="attch_icon_area"><div class="attch_icon"><label for="upload-photo"><i class="fa fa-cloud-upload" aria-hidden="true"></i></label> <input type="file" id="upload-photo" class="up_ld_file crop_upload_image" image_width="378" image_height="226" aspect_ratio_width="16" aspect_ratio_height="9" upload_input_by_name="story_image"><p>Upload From Your Device</p></div>  </div> </div> <div class="publ_btn"> <button id="save_story" class="btn btn-danger">Publish</button> </div></div></div></div></section></div>



                                    </div>
                                </div>
                                <div class="col-md-4 side_area">
                                    <div class="rightBoxArea familyFriend">
                                        <ul>
                                            <li>
                                                <h3>Invite adam's family and friends</h3>
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
                                        <?php $url = "{!!$base_url!!}/public//user/get_memorial/asdsadsad@forevermemorial.com"; ?>
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
                                        <div class="item active"><img src="{!!$base_url!!}/public/user_templates/template_1/images/download.jpg" alt="responsive"   style="width:100%; height: 100%;"></div><div class="item"><img src="{!!$base_url!!}/public/user_templates/template_1/images/download.jpg"style="width:100%; height: 100%;"></div><div class="item"><img src=" {!!$base_url!!}/public/user_templates/template_1/images/download.jpg" style="width:100%; height: 100%;"></div>
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
                                        <div class=" recent_area"><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi"> audio added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_vid"> audio added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_aud"> audio added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_Pic"> audio added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi"> photo added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_vid"> photo added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_aud"> photo added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_Pic"> photo added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi"> video added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_vid"> video added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_aud"> video added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_Pic"> video added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi">  added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_vid">  added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_aud">  added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_Pic">  added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi"> photo added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_vid"> photo added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_aud"> photo added</li></ul><ul><li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi_Pic"> photo added</li></ul></div>
                                    </div>
                                    
                                    <div class="view_sec">
                                        <div class="flx">
                                            <div class="viw_icon">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </div>
                                            <div class="viw_para">
                                                90 Views
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                <section class="footer_area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="sdad">
                                    <h5 class="sdads">Follow us:</h5>
                                    <div class="social">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="links">
                                    <a href="">Memorial Websites</a>
                                    <a href="">Affiliate</a>
                                    <a href="">Resources</a>
                                    <a href="">Terms of Use</a>
                                    <a href="">Privacy Policy</a>
                                    <a href="">Site Map</a>
                                    <a href="">Contact Us</a>
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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
         <form action="">
            <div class="form-group">
              <label for="usr">Enter Email:</label>
              <input type="text" placeholder="example@mail.com,example2@mail.com,example3@mail.com......" class="form-control" id="usr" name="username">
            </div>
           
            
            <button type="button" class="btn btn-primary email_sub" data-toggle="modal"
            data-target="#success_Modal" data-dismiss="modal">Submit</button>
          </form>
          
        </div>
        
       
        
      </div>
    </div>
  </div>
  <!-- The Modal -->
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
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";

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
                        tab_gallinks[i].className = tab_gallinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
                document.getElementById("defaultOpen").click();

            </script>
            </html>


        

<style>
    .vdvjib img {
        /* max-height: 80px; */
        max-width: 100px;
        margin-bottom: 7px;
        border: 1px solid;
        border-radius: 11px;
    }

    .image_area {
        position: relative;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 1000px !important;
    }

    .overlay {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }

    .medsaveclick {
        color: white;
        padding: 1px !important;
    }

    .image_area:hover .overlay {
        height: 50%;
        cursor: pointer;
    }

    .tickbox input {
        height: 23px;
    }

    .text {
        color: blue;
        font-size: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .vsdas {
        margin: -29px -10px;
        margin-bottom: 3%;
    }

    .installmet_div_row {
        padding: 5px 10px;
        border: 1px solid #e6e6e6;
        margin-bottom: 5px;
    }
</style>
<div class="modal fade" id="crop-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="text-align: center; font-size: 14px; font-weight: 600;" class="modal-title">
                    Crop Image Before Upload</h5>
                
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="cropper_sample_image" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>




<!-- cropper open -->

<!-- endbuild -->


<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
<script src="https://unpkg.com/cropperjs"></script>
<!-- cropper close -->

<script>
    $(function() {
        var modal = $('#crop-modal');
        var image = document.getElementById('cropper_sample_image');
        var cropper;
        var image_width;
        var image_height;
        var aspect_ratio_width;
        var aspect_ratio_height;
        var selected_image_input;

        $('.crop_upload_image').change(function(event) {
            var image_num = '';
            selected_image_input = event.target;
            image_width = $($(event)).attr('image_width');
            image_height = $(this).attr('image_height');
            aspect_ratio_width = $(this).attr('aspect_ratio_width');
            aspect_ratio_height = $(this).attr('aspect_ratio_height');
            console.log('image_widthimage_widthimage_width', image_width)
            console.log('image_heightimage_height', image_height)
            console.log('aspect_ratiowidthaspect_ratio_width', aspect_ratio_width)
            console.log('aspect_ratio_heightaspect_ratio_height', aspect_ratio_height)
            var files = event.target.files;
            var done = function(url) {
                image.src = url;
                modal.modal('show');
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function() {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
            image_num = event.target.id;
            console.log('image num ', image_num);
        });

        modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: aspect_ratio_width / aspect_ratio_height,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });


        $('#crop').click(function() {
            canvas = cropper.getCroppedCanvas({
                width: image_width,
                height: image_height
            });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                
                var remove_previous = $(selected_image_input).attr('keep_previous') === "true" ? true:false;
               
                    console.log('keep pre 2',remove_previous);
               

                var upload_input_by_name = $(selected_image_input).attr('upload_input_by_name');
                var pre_image = $('input[name="'+upload_input_by_name+'"]');
                var pre_image_url = '';
                if(pre_image.length > 0 && remove_previous){
                    pre_image_url = pre_image.val();
                }
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        url: "{!!$base_url!!}/cropper/crop_image",
                        method: 'POST',
                        data: {
                            image: base64data,
                            pre_image:pre_image_url,
                            _token: '8aRPPvbbxk42SzEHCdDfGIh9UGeTfK5sGuqLPiip',
                        },
                        success: function(data) {
                            modal.modal('hide');
                            console.log('data image upload  ', data);
                            if (data.status) {
                                var cropped_file_input =
                                    '<input type="hidden" name="' +
                                    upload_input_by_name + '" value="' + data
                                    .image + '">';
                                console.log('m2', cropped_file_input);
                                $(selected_image_input).parent().find('input[name="'+upload_input_by_name+'"]').remove();
                                $(selected_image_input).parent().append(
                                    cropped_file_input);
                            } else {
                                alert('Invalid upload');
                            }
                        }
                    });
                };
            });
        });

        $('.crop_upload_image').click(function() {
            $(this).val('');
        });
    });
</script>

<script>
    var memorial_id = '39';
    var global_path = '{!!$base_url!!}/public/';
    var jsonString = '[{"id":72,"memorial_id":39,"image_url":null,"type":"photo","user_id":11,"deleted_at":null,"created_at":"2023-08-23T07:50:32.000000Z","updated_at":"2023-08-23T07:50:32.000000Z","name_show_var":"adam","date_show_var":" 23rd  August 2023","image_show_var":"https:\/\/stagging.hatinco.com\/4_ever_memories\/public\/images\/64e5ba4193a5f.png"},{"id":71,"memorial_id":39,"image_url":null,"type":"photo","user_id":11,"deleted_at":null,"created_at":"2023-08-22T17:09:24.000000Z","updated_at":"2023-08-22T17:09:24.000000Z","name_show_var":"adam","date_show_var":" 22nd  August 2023","image_show_var":"https:\/\/stagging.hatinco.com\/4_ever_memories\/public\/images\/64e4ebc21e275.png"}]';
    var jsonString_vid = '[{"id":70,"memorial_id":39,"image_url":null,"type":"video","user_id":11,"deleted_at":null,"created_at":"2023-08-22T17:07:58.000000Z","updated_at":"2023-08-22T17:07:58.000000Z","name_show_var":"adam","date_show_var":" 22nd  August 2023","image_show_var":"https:\/\/stagging.hatinco.com\/4_ever_memories\/public\/images\/upload_file\/1692724078.mp4"},{"id":68,"memorial_id":39,"image_url":null,"type":"video","user_id":11,"deleted_at":null,"created_at":"2023-08-22T17:07:30.000000Z","updated_at":"2023-08-22T17:07:30.000000Z","name_show_var":"adam","date_show_var":" 22nd  August 2023","image_show_var":"https:\/\/stagging.hatinco.com\/4_ever_memories\/public\/images\/upload_file\/1692724050.mp4"}]';
    var jsonString_aud = '[{"id":69,"memorial_id":39,"image_url":null,"type":"audio","user_id":11,"deleted_at":null,"created_at":"2023-08-22T17:07:40.000000Z","updated_at":"2023-08-22T17:07:40.000000Z","name_show_var":"adam","date_show_var":" 22nd  August 2023","image_show_var":"https:\/\/stagging.hatinco.com\/4_ever_memories\/public\/images\/upload_file\/1692724060.mp3"}]';
    var jsonString_recent = '[{"date_var":"2023-08-22","type_var":"audio","message_var":" audio added"},{"date_var":"2023-08-22","type_var":"photo","message_var":" photo added"},{"date_var":"2023-08-22","type_var":"video","message_var":" video added"},{"date_var":"2023-08-23","type_var":null,"message_var":"  added"},{"date_var":"2023-08-23","type_var":"photo","message_var":" photo added"}]';
    var gallery_images = JSON.parse(jsonString);
    var gallery_video_ = JSON.parse(jsonString_vid);
    var gallery_audio = JSON.parse(jsonString_aud);
    var recent_show = JSON.parse(jsonString_recent);
    console.log(gallery_images);
    $(document).ready(function() {
        // $("#btn1").click(function() {
        //     $(".add_tribute_append").append(review);
        // });

        set_dynamic_values();

        function set_dynamic_values() {
            initial_values();
            set_dynamic_tribute_images();
        }

        function initial_values() {
            // $('.contentLi_vid').html('added 2 video(s)');
            // $('.contentLi_Pic').html('added 2 photo(s)');
            // $('.contentLi_aud').html('added 1 audio(s)');
            $('.contentLi').html('added 1 tribute(s)');
            $('.viw_para').html('38 Views');
            $('.pht_para').html('2 Photos');
            $('.gall_row').html(get_imges(gallery_images));
            $('.vid_row').html(get_vids(gallery_video_));
            $('.uploaded_audio_area').html(get_auds(gallery_audio));
            $('.recent_area').html(get_recent(recent_show));
            $('.profile_img').html(prof_img(recent_show));
            $('.facebook-share').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + window.location
                .href);
            var images = '';
            if (!gallery_images.length) {
                images = images + image_crousal('{!!$base_url!!}/public/images/logo.png', 0);
            }
            for (var i = 0; i < gallery_images.length; i++) {
                images = images + image_crousal(gallery_images[i].image_show_var, i);
            }
            $('.carousel-inner').html(images);
        }

        function get_imges(images_arr) {

            var images_html = '';
            for (let index = 0; index < images_arr.length; index++) {

                images_html = images_html + `
                    <div class=\"col-md-4 pic_gal_img remove_imgae` + images_arr[index].id + `\"><div class=\"image-area_pic\">
                        <img src=\"` + images_arr[index].image_show_var +
                    `\"   alt=\"\"><a class=\"remove-image_pic\" onclick=\"delete_request( '` + images_arr[
                        index].id + `' )\" style=\"display: inline;\">&#215;</a></div></div>

                
                `;

            }
            return images_html;
        }

        function get_vids(video_arr) {

            var images_html = '';
            for (let index = 0; index < video_arr.length; index++) {

                images_html = images_html + `
                    <div class=\"col-md-4 pic_gal_vid remove_imgae` + video_arr[index].id + `\"><div class=\"image-area_pic\">
                        <video width=\"200\" height=\"200\" controls=\"\">
                        <source src=\"` + video_arr[index].image_show_var +
                    `\"   alt=\"\"></video>
                                    <a class=\"remove-image_pic\" onclick=\"delete_request( '` + video_arr[
                        index].id + `' )\" style=\"display: inline;\">&#215;</a></div></div>

                    

                
                `;

            }
            return images_html;
        }

        function get_auds(audio_arr) {

            var images_html = '';
            for (let index = 0; index < audio_arr.length; index++) {

                images_html = images_html + `
                    

                                            <div class=\"uploaded_audio_box remove_imgae` + audio_arr[index].id + `\"><div class=\"image-area_pic\">

                            <p>ssss` + audio_arr[index].date_show_var + ` .by ` + audio_arr[index].name_show_var + `</p>

                            <audio autostart=\"0\" autostart=\"false\" preload =\"none\" controls >

                            <source src=\"` + audio_arr[index].image_show_var + `\" type=\"audio/mpeg\" />

                            </audio><a class=\"remove-image_pic\"  onclick=\"delete_request( '` + audio_arr[
                        index].id + `' )\"  style=\"display: inline;\">&#215;</a></div></div>

                
                `;

            }
            return images_html;
        }
        function get_recent(recent_arr) {

            var images_html = '';

                images_html = images_html + `
                    

                        <ul>
                            <li class="no-img"><i class="fa fa-pencil-square" aria-hidden="true"></i></li><li class="contentLi"> 1 tribute added </li>
                            </ul>
                        <ul>
                            <li class="no-img"><i class="fa fa-video-camera" aria-hidden="true"></i></li><li class="contentLi"> 2 videos added </li>
                            </ul>
                        <ul>
                            <li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi"> 2 photos added </li>
                            </ul>
                        <ul>
                            <li class="no-img"><i class="fa fa-headphones" aria-hidden="true"></i></li><li class="contentLi"> 1 audio added </li>
                            </ul>
                        

                `;

            return images_html;
        }

        function prof_img(recent_arr) {

            var images_html = '';

                images_html = images_html + `
                    

                            <img src="{!!$base_url!!}/public/theme/user_theme/images/profile.png" alt="relative" />

                `;

            return images_html;
        }


        function set_dynamic_tribute_images() {
            var dynamic_images = true;
            var candles_html = '';
            var flowers_html = '';
            var notes_html = '';
            if (dynamic_images) {
                candles_html = `                
                <button class="bt_no dropbtn">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img class="candle-select-icon-img" src="{!!$base_url!!}/public/user_templates/images/candles/1.png" alt="relative">
                            <span class="sp">Light a Candle</span>
                        </div>
                    </div>
                </button>
                `;
                flowers_html = `                
                <button class="bt_no dropbtn">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img class="flower-select-icon-img" src="{!!$base_url!!}/public/user_templates/images/flowers/1.png" alt="relative">
                            <span class="sp">Lay a Flower</span>
                        </div>
                    </div>
                </button>
                `;
                notes_html = `                
                <button class="bt_no dropbtn">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img class="feather-select-icon-img" src="{!!$base_url!!}/public/user_templates/images/notes/1.png" alt="relative">
                            <span class="sp">Leave a Note</span>
                        </div>
                    </div>
                </button>
                `;
                candles_html = add_candles_list() + candles_html;
                flowers_html = add_flowers_list() + flowers_html;
                notes_html = add_notes_feather_list() + notes_html;
            } else {

                candles_html = `                
                <button onclick="set_tribute('candle','{!!$base_url!!}/public/user_templates/images/candles/1.png"')" class="bt_no ">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img candle-select-icon-img src="{!!$base_url!!}/public/user_templates/images/candles/1.png" alt="relative">
                            <span class="sp">Light a Candle</span>
                        </div>
                    </div>
                </button>
                `;

                flowers_html = `                
                <button onclick="set_tribute('flower','{!!$base_url!!}/public/user_templates/images/flowers/1.png"')" class="bt_no ">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img flower-select-icon-img src="{!!$base_url!!}/public/user_templates/images/flowers/1.png" alt="relative">
                            <span class="sp">Lay a Flower</span>
                        </div>
                    </div>
                </button>
                `;

                notes_html = `                
                <button onclick="set_tribute('feather','{!!$base_url!!}/public/user_templates/images/notes/1.png"')" class="bt_no ">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img feather-select-icon-img src="{!!$base_url!!}/public/user_templates/images/notes/1.png" alt="relative">
                            <span class="sp">Leave a Note</span>
                        </div>
                    </div>
                </button>
                `;
            }

            console.log('candles_html', candles_html);
            $('.candle-select').html(candles_html);
            $('.flower-select').html(flowers_html);
            $('.feather-select').html(notes_html);
        }

        function add_candles_list() {
            candle_list = `
            <div class="dropdown-content">
                <div class="flx_mob">`;
            var candle_arr = [
                "{!!$base_url!!}/public/user_templates/images/candles/1.png",
                "{!!$base_url!!}/public/user_templates/images/candles/2.png",
                "{!!$base_url!!}/public/user_templates/images/candles/3.png",
                "{!!$base_url!!}/public/user_templates/images/candles/4.png",
                "{!!$base_url!!}/public/user_templates/images/candles/5.png",
                "{!!$base_url!!}/public/user_templates/images/candles/6.png",
                "{!!$base_url!!}/public/user_templates/images/candles/7.png",
                "{!!$base_url!!}/public/user_templates/images/candles/8.png",
                "{!!$base_url!!}/public/user_templates/images/candles/9.png",
                "{!!$base_url!!}/public/user_templates/images/candles/10.png",
                "{!!$base_url!!}/public/user_templates/images/candles/11.png",
                "{!!$base_url!!}/public/user_templates/images/candles/12.png",
                "{!!$base_url!!}/public/user_templates/images/candles/13.png",
                "{!!$base_url!!}/public/user_templates/images/candles/14.png",
                // "{!!$base_url!!}/public/user_templates/images/candles/candle.png"
            ];

            $(candle_arr).each(function(index, candle) {
                console.log('candles image', candle);
                candle_list = candle_list + `                
                
                    <div class="cand same" onclick="set_tribute('candle','` + candle + `')">
                        <div class="ico_wri">
                            <img src="` + candle + `" alt="relative">
                        </div>
                    </div>
                `;
            })
            candle_list = candle_list + `</div></div>`;
            return candle_list;
        }

        function add_flowers_list() {
            flower_list = `
            <div class="dropdown-content">
                <div class="flx_mob">`;
            var flowers_arr = [
                "{!!$base_url!!}/public/user_templates/images/flowers/1.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/2.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/3.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/4.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/5.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/6.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/7.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/8.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/9.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/10.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/11.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/12.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/13.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/14.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/15.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/16.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/17.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/18.png",
                "{!!$base_url!!}/public/user_templates/images/flowers/19.png",
                // "{!!$base_url!!}/public/user_templates/images/flowers/flower.png"
            ];

            $(flowers_arr).each(function(index, flower) {
                console.log('flower image', flower);
                flower_list = flower_list + `                
                
                    <div class="cand same" onclick="set_tribute('flower','` + flower + `')">
                        <div class="ico_wri">
                            <img src="` + flower + `" alt="relative">
                        </div>
                    </div>
                `;
            })
            flower_list = flower_list + `</div></div>`;
            return flower_list;
        }

        function add_notes_feather_list() {
            note_list = `
            <div class="dropdown-content">
                <div class="flx_mob">`;
            var notes_arr = [
                "{!!$base_url!!}/public/user_templates/images/notes/1.png",
                "{!!$base_url!!}/public/user_templates/images/notes/2.png",
                "{!!$base_url!!}/public/user_templates/images/notes/3.png",
                "{!!$base_url!!}/public/user_templates/images/notes/4.png",
                "{!!$base_url!!}/public/user_templates/images/notes/5.png",
                // "{!!$base_url!!}/public/user_templates/images/notes/feather.png"
            ];

            $(notes_arr).each(function(index, note) {
                console.log('note image', note);
                note_list = note_list + `                
                
                    <div class="cand same" onclick="set_tribute('feather','` + note + `')">
                        <div class="ico_wri">
                            <img src="` + note + `" alt="relative">
                        </div>
                    </div>
                `;
            })
            note_list = note_list + `</div></div>`;
            return note_list;
        }

        function image_crousal(img, i) {
            var active = '';
            if (i == 0) {
                active = 'active';
            }
            return `
            <div class="item ` + active + `"><img src="` + img + `" alt="responsive" style="width:100%; height: 100%;"></div>
            `;
        }


        $('#save_story').on('click', function() {
            var storyt = $('#story_title').val();
            var storyd = $('#story_details').val();
            var storyp = $('#upload-photo').val();
            if (storyt == "") {
                alert('Plz Write A Title');

                return;
            }
            if (storyd == "") {
                alert('Plz Write A detail');

                return;
            }
            if (storyp == "") {
                alert('Plz Add A Picture');

                return;
            }
            var formData = new FormData();
            formData.append('memorial_id', memorial_id);
            // formData.append('memorial_id', '39');
            formData.append('story_title_n', $('input[name="story_title_n"]').val());
            formData.append('story_details_n', $('#story_details').val());
            formData.append('story_image', $('input[name="story_image"]').val());

            $.ajax({
                url: '{!!$base_url!!}/user/storyform',
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function(res) {
                    console.log('res', res)
                    $(".story_blk").append(get_story_html(res.response));
                    $('input[type="text"],textarea').val('');
                    $('input[type="file"],textarea').val('');

                },
                error: function(err) {
                    console.log('form failed', err);
                }
            })
        });

        function upload_file(file) {

            // if($('input[name="media_type"]').val() == ''){
            //     return;
            // }

            var formData = new FormData();
            formData.append('media_type', $('input[name="media_type"]').val());
            formData.append('upload_file', file);
            formData.append('_token', ('8aRPPvbbxk42SzEHCdDfGIh9UGeTfK5sGuqLPiip'));
            formData.append('memorial_id', memorial_id);

            $.ajax({
                url: '{!!$base_url!!}/user/upload_gallery',
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function(res) {
                    console.log('res', res)
                    if (res.response.type == 'video') {
                        $(".vid_row").append(get_gallery_video_html(res.response));
                        console.log(res.response.type, 'type is here');


                    } else if (res.response.type == 'photo') {
                        $(".gall_row").append(get_gallery_img_html(res.response));
                        console.log(res.response.type, 'type is here');


                    } else {
                        $(".uploaded_audio_area").append(get_gallery_audio_html(res.response));
                        console.log(res.response.type, 'type is here');

                    }
                    // $('input[type="hidden"],textarea').val('');
                    $('input[type="file"],textarea').val('');



                },
                error: function(err) {
                    console.log('form failed', err);
                }
            })
        }

        $('#save_media_audio').on('click', function() {
            var aud = $('.upld_audio').val();
            if (aud == "") {
                // alert('Plz Write A Tribute');

                return;
            }
            upload_file($('input[name="upld_aud"]')[0].files[0]);
        });

        $('#save_media_image').on('click', function() {
            var img = $('#file_upload').val();
            if (img == "") {
                // alert('Plz Write A Tribute');

                return;
            }
            upload_file($('input[name="upld_file_hid"]').val());
        });

        $('#save_media_video').on('click', function() {
            var vid = $('.upld_video').val();
            if (vid == "") {
                // alert('Plz Write A Tribute');

                return;
            }
            upload_file($('input[name="upld_vid"]')[0].files[0]);
        });

        $('#save_trib').on('click', function() {
            var msg = $('#add_tibs').val();
            if (msg == "") {
                // alert('Plz Write A Tribute');

                return;
            }
            var formData = new FormData();
            formData.append('memorial_id', memorial_id);
            formData.append('details_show_var', msg);
            // formData.append('details_show_var', $('textarea[name="tribute"]').val());
            formData.append('type_var', $('#type_tribute').val());
            formData.append('image_tribute', $('#image_tribute').val());

            $.ajax({
                url: '{!!$base_url!!}/user/tributeform',
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function(res) {
                    console.log('res', res)
                    $(".add_tribute_append").append(get_review_html(res.response));
                    $('input[type="text"],textarea').val('');
                    $('input[type="hidden"],textarea').val('');

                    for (const value of formData.values()) {
                        console.log(value);
                    }
                },
                error: function(err) {
                    console.log('form failed', err);
                }
            })
        });

    });

    function set_tribute(type_tribute, tribute_image) {

        console.log('type tribute', type_tribute);
        console.log('tribute_image tribute', tribute_image);

        $('.same').removeClass('selected_tribute');
        var select_class = '';
        // selected_tribute
        if (type_tribute == 'candle') {
            select_class = 'cand';
            $('.candle-select-icon-img').attr('src', tribute_image);
        } else if (type_tribute == 'flower') {
            select_class = 'flower';
            $('.flower-select-icon-img').attr('src', tribute_image);

        } else { // feather
            select_class = 'feather';
            $('.feather-select-icon-img').attr('src', tribute_image);

        }
        $('.' + select_class).addClass('selected_tribute');
        $('#type_tribute').val(type_tribute);
        $('#image_tribute').val(tribute_image);
    }


    function set_media(media_type) {
        $('#media_type').val(media_type);
    }
    $(document).ajaxError(
        function(event, jqXHR, ajaxSettings, thrownError) {
            console.log('[event:' + event + '], [jqXHR:' + jqXHR + '], [ajaxSettings:' + ajaxSettings +
                '], [thrownError:' + thrownError + '])');
        });

    function get_review_html(response) {
        var user_name_show_var = response.user_name_show_var;
        var date_show_var = response.date_show_var;
        var details_show_var = response.details_show_var;
        var type_var = response.type_var;
        if (type_var == 'flower') {
            type_var =
                // '<img src="' + global_path + '/user_templates/template_1/images/imgs/flower.png">';
                '<img src="' + $('#image_tribute').val() + '">';

            // '<img src="http://localhost/4_ever_memories/public/user_templates/template_1/images/imgs/flower.png">';

        } else if (type_var == 'candle') {
            type_var =
                // '<img src="' + global_path + '/user_templates/template_1/images/imgs/candle.png">';
                '<img src="' + $('#image_tribute').val() + '">';
        } else {
            type_var =
                // '<img src="' + global_path + '/user_templates/template_1/images/imgs/feather.png">';
                '<img src="' + $('#image_tribute').val() + '">';

        }
        var review = `
                    <div class="reviewBox">
                        <div class="newTag">
                            <span class="badge badge-secondary">New</span>
                        </div>
                        <ul class="reviewSection">
                            <li>
                                ` + type_var + `
                            </li>
                            <li>
                                <h3>` + user_name_show_var + `</h3>
                                <h5>` + date_show_var + `</h5>
                                <p>` + details_show_var + `</p>
                            </li>
                        </ul>
                    </div>
                    `;
        return review;

    }



    function get_story_html(response) {

        var user_name_show_var = response.user_name_show_var;
        var date_show_var = response.date_show_var;
        var details_show_var = response.details_show_var;
        var story_title = response.story_title_show_var;
        var image_show_var = `<img src="` + response.image_show_var + ` " alt="relative">`;
        console.log(image_show_var, 'image');

        var review = `
        <div class="story_tab">
                    <h3>` + story_title + `</h3>
                    <p>
                ` + date_show_var + `.by ` + user_name_show_var + `</p>
                ` + image_show_var + ` 
            <div class="story_para">
                <p>` + details_show_var + `
                </p>
                <div class="whole">
                    <div class="flx">
                        <div class="share">
                            <i class="fa fa-share-alt-square" aria-hidden="true"></i>
                        </div>
                        <div class="chr_p">
                            Share
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
        return review;

    }

    function get_gallery_img_html(response) {
        var image_show_var = `<img src="` + response.image_show_var + ` " alt="relative">`;
        var user_id = response.id;
        console.log(image_show_var, 'image');

        var review = `
                    <div class="col-md-4 pic_gal_img remove_imgae` + user_id + `" >
                        <div class="image-area_pic">
                            ` + image_show_var + ` 
                            <a class="remove-image_pic" onclick="delete_request(` + user_id + `)" style="display: inline;">&#215;</a>
                        </div>
                    </div>
        `;
        return review;

    }



    function get_gallery_video_html(response) {
        var image_show_var = `<video width="200" height="200" controls=""><source src="` + response.image_show_var +
            `" alt=""></video>`;
        var gallery_id = response.id;

        console.log(image_show_var, 'image');

        var review = `
                    <div class="col-md-4 pic_gal_vid remove_imgae` + gallery_id + `">
                        <div class="image-area_pic">

                            ` + image_show_var + ` 
                            <a class="remove-image_pic" onclick="delete_request(` + gallery_id + `)" style="display: inline;">&#215;</a>
                        </div>
                    </div>
        `;
        return review;

    }

    function get_gallery_audio_html(response) {
        var image_show_var = response.image_show_var;
        var date_show_var = response.date_show_var;
        var name_show_var = response.name_show_var;
        var gallery_id = response.id;
        console.log(image_show_var, 'image');

        var review = `
                                        <div class="uploaded_audio_box remove_imgae` + gallery_id + `">
                                            <div class="image-area_pic">
                                            
                                            <h4><div class="new_tag">new</div>` + date_show_var + ` .by  ` +
            name_show_var + `</h4>
                                            <audio controls autostart="0" autostart="false" preload ="none" >
                                                <source src="` + image_show_var + `" type="audio/mpeg">
                                              </audio>
                                              <a class="remove-image_pic" onclick="delete_request(` + gallery_id + `)" style="display: inline;">&#215;</a>
                                        </div>
                                        </div>
        `;
        return review;

    }

    // function delete_request(user_id){
    //     alert(`"delete`+ user_id +`"`);
    // }
    function delete_request(gallery_id) {
        $.ajax({

            url: "{!!$base_url!!}/user/delete/" + gallery_id,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '8aRPPvbbxk42SzEHCdDfGIh9UGeTfK5sGuqLPiip'
            },
            success: function(response) {
                console.log(response);
                if (response.status) {

                    $('.remove_imgae' + gallery_id).remove();

                }
            }
        });
    }

    // function delete_request_vid(gallery_id) {
    //     $.ajax({

    //         url: "{!!$base_url!!}/public/user/delete/" + gallery_id,
    //         type: 'POST',
    //         dataType: 'json',
    //         data: {
    //             _token: '8aRPPvbbxk42SzEHCdDfGIh9UGeTfK5sGuqLPiip'
    //         },
    //         success: function(response) {
    //             console.log(response);
    //             if (response.status) {

    //                 $('.remove_vid' + user_id).remove();

    //             }
    //         }
    //     });
    // }
</script>
