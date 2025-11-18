<?php 
// dd($user_website); 
?>

{!! $html !!}
{{-- Sign in modal --}}
<div class="modal fade" id="LoginModalCenter" tabindex="-1" role="dialog"
aria-labelledby="LoginModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header modhead">
            <h5 class="modal-title" id="loginModalLongTitle">Sign in With Your Email</h5>
        </div>
        <div class="modal-body">
            <div class="signmodaldata">
                <form action="{!! asset('user/login') !!}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Enter Your Email address :</label>
                        <input type="email" name="email" class="form-control" id="email"
                            aria-describedby="email" placeholder="email address">
                    </div>
                    <div class="form-group">
                        <label for="password">Enter Your Password :</label>
                        <input type="password" name="password" class="form-control" id="password"
                            aria-describedby="password" placeholder="password">
                    </div>
                    <p class="reg_md">Dont have an account? <a aria-hidden="true" data-toggle="modal" data-target="#remodal">Register Now</a></p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mosubclick">Submit</button>
                    </div>
                </form>
                {{-- <i  aria-hidden="true" data-toggle="modal" data-target="#remodal"> Registration</i> --}}

            </div>
        </div>

    </div>
</div>
</div>
{{-- End Sign in modal --}}

{{-- Register in modal --}}
<div class="modal fade" id="remodal" tabindex="-1" role="dialog" aria-labelledby="LoginModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header modhead">
            <h5 class="modal-title" id="loginModalLongTitle">Register With Your Email</h5>
        </div>
        <div class="modal-body">
            <div class="signmodaldata">
                <form action="{!! asset('user/register') !!}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Enter Name :</label>
                        <input type="text" name="name" class="form-control" id="name"
                            aria-describedby="email" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Your Email address :</label>
                        <input type="email" name="email" class="form-control" id="email"
                            aria-describedby="email" placeholder="email address">
                    </div>
                    <div class="form-group">
                        <label for="password">Enter Your Password :</label>
                        <input type="password" name="password" class="form-control" id="password"
                            aria-describedby="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Your Password :</label>
                        <input type="password" name="password" class="form-control" id="password"
                            aria-describedby="password" placeholder="password">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mosubclick">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
{{-- End Register in modal --}}

<input type="hidden" name="sndng_mail" value="{!! $user_website->id !!}">
@include('partial_layouts.cropper.cropper_html')
@php
    $video_count = $gal_side->where('type', 'video')->count();
    $picture_count = $gal_side->where('type', 'photo')->count();
    $audio_count = $gal_side->where('type', 'audio')->count();
@endphp
<script>
    $(document).ready(function () {
        var isAuthenticated = {!! Auth::check() ? 'true' : 'false' !!};

        if (isAuthenticated) {
            $('.signin').css('display', 'none');
            $('.fa-user-circle-o').css('display', 'inline-flex');
        } else {
            $('.fa-user-circle-o').css('display', 'none');
            $('.signin').css('display', 'inline-flex');
        }
    });
    
    var memorial_id = '{!! $user_website->id !!}';
    var global_path = `{!! asset('/') !!}`;
    var jsonString = `{!! json_encode($web_variable['gallery_photo_arr']) !!}`;
    var jsonString_vid = `{!! json_encode($web_variable['gallery_video_arr']) !!}`;
    var jsonString_aud = `{!! json_encode($web_variable['gallery_audio_arr']) !!}`;
    var jsonString_recent = `{!! json_encode($web_variable['recent_updates_show_arr']) !!}`;
    var gallery_images = JSON.parse(jsonString);
    var gallery_video_ = JSON.parse(jsonString_vid);
    var gallery_audio = JSON.parse(jsonString_aud);
    var recent_show = JSON.parse(jsonString_recent);
    console.log(gallery_images);

    function hide_initially() {
        $('.face_share').hide();
    }
    $(document).ready(function() {
        // $("#btn1").click(function() {
        //     $(".add_tribute_append").append(review);
        // });

        set_dynamic_values();

        function set_dynamic_values() {
            initial_values();
            hide_initially();
            set_dynamic_tribute_images();
            
            initAudio();
            play_music();
        }

        // $('#save_trib').on('click', function() {

        $('.sumit_email').on('click', function() {
            // VAR url = '{!! asset('user/invite') !!}';
            console.log('email sent');
            var formData = new FormData();
            formData.append('memorial_id', '{!! $user_website->id !!}');
            formData.append('to_emails', $('.share_inveite_emails').val());
            console.log('share email', $('.share_inveite_emails').val());



            //   ajax
            $.ajax({
                url: "{{ asset('user/invite') }}",
                type: 'POST',
                dataType: 'json',
                data: formData, // Send the FormData object directly
                contentType: false, // Set contentType to false to prevent jQuery from processing the data
                processData: false, // Set processData to false to prevent jQuery from converting the data to a query string
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Use headers to set the CSRF token
                },
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        console.log('email sent');
                        $('#success_Modal').modal('toggle');
                        // $('#success_Modal').modal('show');
                    } else {
                        show_error_modal_with_msg(response);
                    }
                },
                error: function(err) {
                    console.log('form failed', err);
                    show_error_modal_with_msg(null, 'Can not proceed now please try later');
                }
            });
        });

        function play_music() {
            return;
            var audioUrl = '{!! $user_website->background_voice ?? '' !!}';
            
            // Comprehensive check
            if (audioUrl && 
                audioUrl.trim() !== '') {
                
                console.log('Attempting to play:', audioUrl);
                var audio = new Audio(audioUrl);
                
                // Modern play with promise handling
                var playPromise = audio.play();
                
                if (playPromise !== undefined) {
                    playPromise.then(_ => {
                        console.log('Audio started successfully');
                    }).catch(error => {
                        console.log('Playback failed:', error);
                        // Handle browsers that block autoplay
                        if (error.name === 'NotAllowedError') {
                            alert('Please click anywhere on the page to enable audio playback, then try again.');
                        }
                    });
                }
            } else {
                console.warn('No valid audio URL found');
            }
        }

        function initAudio() {
    var audioUrl = '{!! $user_website->background_voice ?? '' !!}';
    
    if (audioUrl && audioUrl.trim() !== '') {
        console.log('Audio ready:', audioUrl);
        var audio = new Audio(audioUrl);
        
        // Store audio globally for later use
        window.backgroundAudio = audio;
        
        // Add click event listener to entire document
        document.addEventListener('click', function playOnFirstClick() {
            if (window.backgroundAudio) {
                var playPromise = window.backgroundAudio.play();
                
                if (playPromise !== undefined) {
                    playPromise.then(_ => {
                        console.log('Audio started successfully');
                    }).catch(error => {
                        console.log('Playback failed:', error);
                    });
                }
                
                // Remove listener after first click
                document.removeEventListener('click', playOnFirstClick);
            }
        });
    } else {
        console.warn('No valid audio URL found');
    }
}

        function initial_values() {
            $('.contentLi').html('added {!! $trib_side !!} tribute(s)');
            $('.viw_para').html('{!! $user_website->total_views !!} Views');

            $('.pht_para').html(`{!! count($web_variable['gallery_photo_arr']) !!}) Photos`);
            $('.gall_row').html(get_imges(gallery_images));
            $('.vid_row').html(get_vids(gallery_video_));
            $('.uploaded_audio_area').html(get_auds(gallery_audio));
            $('.recent_area').html(get_recent(recent_show));
            $('.profile_img').html(prof_img(`{!!$user_website->image_show_var!!}`));
            // $('.ban_img').html(banner_img(recent_show));
  
            $('.ban_img').css(' background-image',`{!!asset("public/user_templates/template_1/images/cover1.png")!!}`);
            $('.facebook-share').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' +
                window.location
                .href);
            var images = '';
            if (!gallery_images.length) {
                images = images + image_crousal(`{!! asset('public/theme/images/logo_change.jpg') !!}`, 0);
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
                    `\"   alt=\"\"><a class=\"remove-image_pic\" onclick=\"delete_request( '` +
                    images_arr[
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
                            <li class="no-img"><i class="fa fa-pencil-square" aria-hidden="true"></i></li><li class="contentLi"> {!! $trib_side !!} tribute{!! $trib_side > 1 ? 's' : '' !!} added </li>
                            </ul>
                        <ul>
                            <li class="no-img"><i class="fa fa-video-camera" aria-hidden="true"></i></li><li class="contentLi"> {!! $video_count !!} video{!! $video_count > 1 ? 's' : '' !!} added </li>
                            </ul>
                        <ul>
                            <li class="no-img"><i class="fa fa-picture-o" aria-hidden="true"></i></li><li class="contentLi"> {!! $picture_count !!} photo{!! $picture_count > 1 ? 's' : '' !!} added </li>
                            </ul>
                        <ul>
                            <li class="no-img"><i class="fa fa-headphones" aria-hidden="true"></i></li><li class="contentLi"> {!! $audio_count !!} audio{!! $audio_count > 1 ? 's' : '' !!} added </li>
                            </ul>
                        

                `;

            return images_html;
        }

        function prof_img(img) {

            var images_html = '';
            console.log('asdasdas img ',img);

            images_html = images_html + `
                    

                            <img class="asdasdasdas" src="`+img+`" alt="relative" />

                `;

            return images_html;
        }

        function banner_img(recent_arr) {

            var images_html = '';

            images_html = images_html + `
                    
            <style>
                .nav_back {
                    background-image: url(' . $public_path . 'user_templates/template_1/images/cover1.png);
                            }
            </style>

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
                            <img class="candle-select-icon-img" src="{!! asset('public/user_templates/images/candles/1.png') !!}" alt="relative">
                            <span class="sp">Light a Candle</span>
                        </div>
                    </div>
                </button>
                `;
                flowers_html = `                
                <button class="bt_no dropbtn">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img class="flower-select-icon-img" src="{!! asset('public/user_templates/images/flowers/1.png') !!}" alt="relative">
                            <span class="sp">Lay a Flower</span>
                        </div>
                    </div>
                </button>
                `;
                notes_html = `                
                <button class="bt_no dropbtn">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img class="feather-select-icon-img" src="{!! asset('public/user_templates/images/notes/1.png') !!}" alt="relative">
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
                <button onclick="set_tribute('candle','{!! asset('public/user_templates/images/candles/1.png') !!}"',this)" class="bt_no ">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img candle-select-icon-img src="{!! asset('public/user_templates/images/candles/1.png') !!}" alt="relative">
                            <span class="sp">Light a Candle</span>
                        </div>
                    </div>
                </button>
                `;

                flowers_html = `                
                <button onclick="set_tribute('flower','{!! asset('public/user_templates/images/flowers/1.png') !!}"',this)" class="bt_no ">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img flower-select-icon-img src="{!! asset('public/user_templates/images/flowers/1.png') !!}" alt="relative">
                            <span class="sp">Lay a Flower</span>
                        </div>
                    </div>
                </button>
                `;

                notes_html = `                
                <button onclick="set_tribute('feather','{!! asset('public/user_templates/images/notes/1.png') !!}"',this)" class="bt_no ">
                    <div class="cand same">
                        <div class="ico_wri">
                            <img feather-select-icon-img src="{!! asset('public/user_templates/images/notes/1.png') !!}" alt="relative">
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
                "{!! asset('public/user_templates/images/candles/1.png') !!}",
                "{!! asset('public/user_templates/images/candles/2.png') !!}",
                "{!! asset('public/user_templates/images/candles/3.png') !!}",
                "{!! asset('public/user_templates/images/candles/4.png') !!}",
                "{!! asset('public/user_templates/images/candles/5.png') !!}",
                "{!! asset('public/user_templates/images/candles/6.png') !!}",
                "{!! asset('public/user_templates/images/candles/7.png') !!}",
                "{!! asset('public/user_templates/images/candles/8.png') !!}",
                "{!! asset('public/user_templates/images/candles/9.png') !!}",
                "{!! asset('public/user_templates/images/candles/10.png') !!}",
                "{!! asset('public/user_templates/images/candles/11.png') !!}",
                "{!! asset('public/user_templates/images/candles/12.png') !!}",
                "{!! asset('public/user_templates/images/candles/13.png') !!}",
                "{!! asset('public/user_templates/images/candles/14.png') !!}",
                // "{!! asset('public/user_templates/images/candles/candle.png') !!}"
            ];

            $(candle_arr).each(function(index, candle) {
                console.log('candles image', candle);
                candle_list = candle_list + `                
                
                    <div class="cand same" onclick="set_tribute('candle','` + candle + `',this)">
                        <div class="ico_wri icon_select">
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
                "{!! asset('public/user_templates/images/flowers/1.png') !!}",
                "{!! asset('public/user_templates/images/flowers/2.png') !!}",
                "{!! asset('public/user_templates/images/flowers/3.png') !!}",
                "{!! asset('public/user_templates/images/flowers/4.png') !!}",
                "{!! asset('public/user_templates/images/flowers/5.png') !!}",
                "{!! asset('public/user_templates/images/flowers/6.png') !!}",
                "{!! asset('public/user_templates/images/flowers/7.png') !!}",
                "{!! asset('public/user_templates/images/flowers/8.png') !!}",
                "{!! asset('public/user_templates/images/flowers/9.png') !!}",
                "{!! asset('public/user_templates/images/flowers/10.png') !!}",
                "{!! asset('public/user_templates/images/flowers/11.png') !!}",
                "{!! asset('public/user_templates/images/flowers/12.png') !!}",
                "{!! asset('public/user_templates/images/flowers/13.png') !!}",
                "{!! asset('public/user_templates/images/flowers/14.png') !!}",
                "{!! asset('public/user_templates/images/flowers/15.png') !!}",
                "{!! asset('public/user_templates/images/flowers/16.png') !!}",
                "{!! asset('public/user_templates/images/flowers/17.png') !!}",
                "{!! asset('public/user_templates/images/flowers/18.png') !!}",
                "{!! asset('public/user_templates/images/flowers/19.png') !!}",
                // "{!! asset('public/user_templates/images/flowers/flower.png') !!}"
            ];

            $(flowers_arr).each(function(index, flower) {
                console.log('flower image', flower);
                flower_list = flower_list + `                
                
                    <div class="cand same" onclick="set_tribute('flower','` + flower + `',this)">
                        <div class="ico_wri">
                            <img src="` + flower + `" alt="relative">
                        </div>
                    </div>
                `;
            })
            flower_list = flower_list + `</div></div>`;
            return flower_list;
        }
        function toggleDropdown() {
    var dropdownContent = document.querySelector('.dropdown-content');
    dropdownContent.classList.toggle('show');
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropdown-btn')) {
        var dropdowns = document.getElementsByClassName('dropdown-content');
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
        function add_notes_feather_list() {
            note_list = `
            <div class="dropdown-content">
                <div class="flx_mob drop_icn">`;
            var notes_arr = [
                "{!! asset('public/user_templates/images/notes/1.png') !!}",
                "{!! asset('public/user_templates/images/notes/2.png') !!}",
                "{!! asset('public/user_templates/images/notes/3.png') !!}",
                "{!! asset('public/user_templates/images/notes/4.png') !!}",
                "{!! asset('public/user_templates/images/notes/5.png') !!}",
                // "{!! asset('public/user_templates/images/notes/feather.png') !!}"
            ];

            $(notes_arr).each(function(index, note) {
                console.log('note image', note);
                note_list = note_list + `                
                
                    <div class="cand same not_icn_c" onclick="set_tribute('feather','` + note + `',this)">
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
                alert('Please Write A Title');

                return;
            }
            if (storyd == "") {
                alert('Please Write A detail');

                return;
            }
            if (storyp == "") {
                alert('Please Add A Picture');

                return;
            }
            var formData = new FormData();
            formData.append('memorial_id', memorial_id);
            // formData.append('memorial_id', '{!! $user_website->id !!}');
            formData.append('story_title_n', $('input[name="story_title_n"]').val());
            formData.append('story_details_n', $('#story_details').val());
            formData.append('story_image', $('input[name="story_image"]').val());

            $.ajax({
                url: `{!! asset('user/storyform') !!}`,
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function(res) {
                    console.log('res', res)
                    if (res.status) {
                        $(".story_blk").append(get_story_html(res.response));
                        $('input[type="text"],textarea').val('');
                        $('input[type="file"],textarea').val('');
                    } else {
                        show_error_modal_with_msg(res);
                    }
                },
                error: function(err) {
                    console.log('form failed', err);
                    show_error_modal_with_msg(null, 'Can not proceed now please try later');
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
            formData.append('_token', ('{{ csrf_token() }}'));
            formData.append('memorial_id', memorial_id);

            $.ajax({
                url: `{!! asset('user/upload_gallery') !!}`,
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
                    if (!res.status) {
                        show_error_modal_with_msg(res);
                        return;
                    }
                    if (res.response.type == 'video') {
                        $(".vid_row").append(get_gallery_video_html(res.response));
                    } else if (res.response.type == 'photo') {
                        $(".gall_row").append(get_gallery_img_html(res.response));
                    } else {
                        $(".uploaded_audio_area").append(get_gallery_audio_html(res
                            .response));
                    }
                    $('input[type="file"],textarea').val('');
                },
                error: function(err) {
                    console.log('form failed', err);
                    show_error_modal_with_msg(null, 'Can not proceed now please try later');
                }
            })
        }

        $('#save_media_audio').on('click', function() {
            var aud = $('.upld_audio').val();
            if (aud == "") {
                // alert('Please Write A Tribute');

                return;
            }
            upload_file($('input[name="upld_aud"]')[0].files[0]);
        });

        $('#save_media_image').on('click', function() {
            var img = $('#file_upload').val();
            if (img == "") {
                // alert('Please Write A Tribute');

                return;
            }
            upload_file($('input[name="upld_file_hid"]').val());
        });

        $('#save_media_video').on('click', function() {
            var vid = $('.upld_video').val();
            if (vid == "") {
                // alert('Please Write A Tribute');

                return;
            }
            upload_file($('input[name="upld_vid"]')[0].files[0]);
        });

        $('#save_trib').on('click', function() {
            var msg = $('#add_tibs').val();
            if (msg == "") {
                // alert('Please Write A Tribute');

                return;
            }
            var formData = new FormData();
            formData.append('memorial_id', memorial_id);
            formData.append('details_show_var', msg);
            // formData.append('details_show_var', $('textarea[name="tribute"]').val());
            if ($('#type_tribute').val() == '') {
                set_tribute('candle', `{!! asset('public/user_templates/images/candles/1.png') !!}`, this);
            }
            formData.append('type_var', $('#type_tribute').val());
            formData.append('image_tribute', $('#image_tribute').val());

            $.ajax({
                url: `{!! asset('user/tributeform') !!}`,
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function(res) {
                    console.log('res', res)
                    if (res.status) {
                        $(".add_tribute_append").append(get_review_html(res
                            .response));
                        $('input[type="text"],textarea').val('');
                        $('input[type="hidden"],textarea').val('');
                    } else {
                        show_error_modal_with_msg(res);
                    }
                    for (const value of formData.values()) {
                        console.log(value);
                    }
                },
                error: function(err) {
                    console.log('form failed', err);
                    show_error_modal_with_msg(null, 'Can not proceed now please try later');
                }
            })
        });

    });

    function show_error_modal_with_msg(res, custom_error) {
        var error_msg = 'Can not submit now. Please Login again';
        if (!res) {
            error_msg = custom_error;
        } else {
            if (res && res.hasOwnProperty('error') && res.error.hasOwnProperty('message') && res.error.message.length) {
                error_msg = res.error.message[0];
            }
        }

        $('#errorText').text(error_msg);
        $('#errorModal').modal('show');
    }

    function set_tribute(type_tribute, tribute_image, e) {

        console.log('type tribute', type_tribute);
        console.log('tribute_image tribute', tribute_image);

        $(e).parent('.flx_mob').find('.ico_wri').removeClass('icon_selected');
        $(e).find('.ico_wri').addClass('icon_selected');

        // $('.dropdown-content').css('display','none');
        // $('.dropdown:hover .dropdown-content').css('display','block');


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
                '<img src="' + $('#image_tribute').val() + '">';
        } else if (type_var == 'candle') {
            type_var =
                '<img src="' + $('#image_tribute').val() + '">';
        } else {
            type_var =
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
        var image_show_var = `<video width="200" height="200" controls=""><source src="` + response
            .image_show_var +
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

    function delete_request(gallery_id) {
        $.ajax({
            url: "{!! asset('user/delete') !!}/" + gallery_id,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{!! @csrf_token() !!}'
            },
            success: function(response) {
                console.log(response);
                if (response.status) {

                    $('.remove_imgae' + gallery_id).remove();

                } else {
                    show_error_modal_with_msg(response);
                }
            },
            error: function(err) {
                console.log('form failed', err);
                show_error_modal_with_msg(null, 'Can not proceed now please try later');
            }
        });
    }
</script>
