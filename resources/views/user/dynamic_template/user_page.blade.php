<?php 
$success_message = Session::get('success');
$error_msg = Session::get('error');
?>

  
{!! $html !!}
  @if (isset($error_msg))
    <div class="alert alert-danger alt_area">
        <span style="float: right " onclick="$(this).parent().remove();">X</span>
        <ul>
            {{-- @foreach (Session::get('login_error')->all() as $error) --}}
            <li>{{ $error_msg }}</li>
            {{-- @endforeach --}}
        </ul>
    </div>
    @endif
    @if (isset($success_message))
    <div class="alert alert-success alt_area">
        <span style="float: right" onclick="$(this).parent().remove();">X</span>
        <ul>
            {{-- @foreach (Session::get('success')->all() as $success) --}}
            <li>{{ $success_message }}</li>
            {{-- @endforeach --}}
        </ul>
    </div>
    @endif
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
                    
                    <div class="mb-3">
                        <!-- <a class="forgot-password-link" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" data-bs-dismiss="modal">
                            Forgot Password?
                        </a> -->
                        <a class="forgot-password-link" data-toggle="modal" data-target="#forgotPasswordModal" data-dismiss="modal">
                            Forgot Password?
                        </a>
                    </div>
                    <p class="reg_md">Dont have an account? <a aria-hidden="true" data-toggle="modal" data-target="#remodal">Register Now</a></p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mosubclick">Submit</button>
                    </div>
                </form>
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

    {{-- Forgot Password Modal --}}
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modhead">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="forgotPasswordModalTitle">Reset Your Password</h5>
                </div>
                <div class="modal-body">
                    <div class="forgotpasswordmodaldata">
                        <p>Enter your email address and we'll send you a link to reset your password.</p>
                        <form action="{!! asset('user/forget_password') !!}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label for="forgotEmail">Enter Your Email address:</label>
                                <input type="email" name="email" class="form-control" id="forgotEmail" aria-describedby="forgotEmail" placeholder="email address" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Forgot Password modal --}}
    {{-- Share ModalBackup --}}
    <div class="modal fade" id="desktopShareModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Share</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body text-center">

                <!-- WhatsApp -->
                <a class="btn btn-success btn-block" 
                href="https://wa.me/?text=Check this link: {{ url()->current() }}" 
                target="_blank">
                <i class="fa fa-whatsapp"></i> WhatsApp
                </a>

                <!-- Facebook -->
                <a class="btn btn-primary btn-block" 
                href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                target="_blank">
                <i class="fa fa-facebook"></i> Facebook
                </a>

                <!-- Email -->
                <a class="btn btn-info btn-block" 
                href="mailto:?subject=Check this&body={{ url()->current() }}">
                <i class="fa fa-envelope"></i> Email
                </a>

                <!-- Copy Link -->
                <button class="btn btn-secondary btn-block copy_link_btn">
                <i class="fa fa-copy"></i> Copy Link
                </button>

            </div>

            </div>
        </div>
        </div>
    {{-- End Share ModalBackup --}}
    
    {{-- Loader Modal --}}
    <div class="modal fade" id="loaderModal" tabindex="-1" role="dialog" aria-labelledby="loaderModalLabel" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background: transparent; border: none;">
                <div class="modal-body text-center">
                    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p class="text-white mt-2">Please Wait...</p>
                </div>
            </div>
        </div>
    </div>
    {{-- End Loader Modal --}}
    



<!-- Audio Control Button -->
<div id="audioControl" style="position: fixed; top: 50px; right: 20px; z-index: 10000; background: rgba(255,255,255,0.9); padding: 10px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.2);">
    <button id="playAudioBtn" style="padding: 8px 12px; background: #4CAF50; color: white; border: none; border-radius: 3px; cursor: pointer; font-size: 12px; display: flex; align-items: center; gap: 5px;">
        <span id="audioIcon">🔇</span>
        <span id="audioText">Play Music</span>
    </button>
</div>

<input type="hidden" name="sndng_mail" value="{!! $user_website->id !!}">
@include('partial_layouts.cropper.cropper_html')
@php
    $video_count = $gal_side->where('type', 'video')->count();
    $picture_count = $gal_side->where('type', 'photo')->count();
    $audio_count = $gal_side->where('type', 'audio')->count();
@endphp
<script>
    var backgroundAudio = null;
    var isAudioPlaying = false;
    var audioInitialized = false;    
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
    var max_audio_size_mb = 3; // 3MB
    var max_video_size_mb = 7; // 5MB
</script>
@include('user.dynamic_template.common_js_all_user_templates')