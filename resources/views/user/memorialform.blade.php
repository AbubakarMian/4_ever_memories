<!DOCTYPE html>
<html lang="en">

<head>
    <title>4 Ever Memorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{!! asset('public/theme/user_theme/css/memorial.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/theme/user_theme/css/main.css') !!}" rel="stylesheet">

</head>
@extends('user_layout.main_header_footer')
<style>
    .package-intro {
    text-align: center;
    margin-bottom: 30px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    }
    .package-intro h3 {
        color: #2c3e50;
        margin-bottom: 10px;
    }
    .billing-note {
        color: #e74c3c;
        font-weight: 600;
        margin-top: 10px;
        font-size: 14px;
    }
    .pricing {
        text-align: center;
        margin-bottom: 15px;
    }
    .price {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        line-height: 1;
    }
    .period {
        font-size: 16px;
        color: #7f8c8d;
        font-weight: 400;
    }
    .memorial-count-badge {
        text-align: center;
        font-weight: bold;
        font-size: 18px;
        color: #3498db;
        background: rgba(52, 152, 219, 0.1);
        padding: 8px;
        border-radius: 6px;
        margin-top: 5px;
    }
    .popular-package {
        border: 2px solid #3498db;
        position: relative;
    }
    .popular-badge {
        position: absolute;
        top: 15px;
        right: -30px;
        background: #3498db;
        color: white;
        padding: 5px 30px;
        transform: rotate(45deg);
        font-size: 12px;
        font-weight: bold;
    }
    .package-footer {
        text-align: center;
        margin-top: 30px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        font-size: 14px;
    }
    .savings-note {
        color: #27ae60;
        font-weight: 600;
        margin-top: 10px;
        font-size: 14px;
    }
    
</style>
<body onload="disableSubmit()">

    <section>
        <div class="contacttopbanner">
            @include('user_layout.components.banner_menu')
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bannerdata aboutheading">
                            <h1>CREATE A MEMORIAL</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="tabsarea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tabdata">
                            <ul class="nav nav-tabs tabmenu form_tab">
                                <!-- <li class=""><a data-toggle="tab" href="#home">ACCOUNT DETAILS</a></li> -->
                                <li><a data-toggle="tab" href="#menu1">ABOUT YOUR LOVED ONE</a></li>
                                <li><a data-toggle="tab" id="choose_plan_tab" href="#menu2">CHOOSE YOUR PLAN</a></li>
                                <li id="privacy_tab"><a data-toggle="tab" href="#menu3">PRIVACY OPTIONS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="tab-content">
                                <div id="menu1" class="tab-pane fade in active">
                                    <div class="cardformarea">
                                        <h2>This memorial is dedicated to:</h2>

                                        <form class="create_memorial_form" action="{!! asset('user/adduser') !!}"
                                            method="post">
                                            {!! csrf_field() !!}
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">First Name<i
                                                            class="fa fa-asterisk staring"
                                                            aria-hidden="true"></i></label>


                                                    <input type="text" required name="f_name" class="form-control"
                                                        placeholder="First Name">

                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Middle Name<i
                                                            class="fa fa-asterisk staring"
                                                            aria-hidden="true"></i></label>
                                                    <input type="text" name="m_name" class="form-control"
                                                        placeholder="Middle Name" required>
                                                </div>



                                            </div>
                                            <div class="col-sm-6">

                                                
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Last Name<i
                                                            class="fa fa-asterisk staring"
                                                            aria-hidden="true"></i></label>
                                                    <input type="text" required name="l_name" class="form-control"
                                                        placeholder="Last Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Deceased Profile Image<i
                                                            class="fa fa-asterisk staring"
                                                            aria-hidden="true"></i></label>
                                                    {{-- name="prof_img" --}}
                                                    <input type="file"
                                                        class="form-control prof_box crop_upload_image" accept="image/*"
                                                        image_width="378" image_height="226" aspect_ratio_width="16"
                                                        aspect_ratio_height="9" upload_input_by_name="prof_img"
                                                        required>

                                                </div>

                                            </div>

                                            <!-- NEW MP3 UPLOAD FIELD -->
                                            <div class="form-group">
                                                <label for="background_audio">Background Music<i class="fa fa-asterisk staring" aria-hidden="true"></i></label>
                                                <div class="audio-upload-info">
                                                    <p class="help-text">Upload an MP3 file to play as background audio on this memorial page. This could be recorded message, or a tribute speech.</p>
                                                </div>
                                                <input type="file" id="background_audio" name="background_audio" class="form-control" accept="audio/mp3,audio/*" required>
                                                <!-- <div class="audio-preview" id="audio-preview" style="display: none;">
                                                    <audio controls class="preview-audio">
                                                        <source src="" type="audio/mp3">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                    <p class="audio-file-name"></p>
                                                </div> -->
                                            </div>
                                            <div class="form-group">
                                                <label name="gender" for="exampleFormControlSelect1">Gender</i></label>
                                                <select class="form-control" name="gender" required
                                                    id="exampleFormControlSelect1">
                                                    <!-- <option value="" selected="" disabled="" hidden="">
                                                        Gender</option> -->
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label name="relation" for="exampleFormControlSelect1">Relationship<i
                                                        class="fa fa-asterisk staring" aria-hidden="true"></i></label>

                                                <input list="relations"
                                                    placeholder="Please write/select a relationship"
                                                    class="form-control" name="relation" required>
                                                <datalist id="relations">
                                                    <option value="Aunt">Aunt</option>
                                                    <option value="Brother">Brother</option>
                                                    <option value="Colleague">Colleague</option>
                                                    <option value="Cousin">Cousin</option>
                                                    <option value="Daughter">Daughter</option>
                                                    <option value="Father">Father</option>
                                                    <option value="Friend">Friend</option>
                                                    <option value="Granddaughter">Granddaughter</option>
                                                    <option value="Grandfather">Grandfather</option>
                                                    <option value="Grandmother">Grandmother</option>
                                                    <option value="Grandson">Grandson</option>
                                                    <option value="Husband">Husband</option>
                                                    <option value="Mother">Mother</option>
                                                    <option value="Nephew">Nephew</option>
                                                    <option value="Niece">Niece</option>
                                                    <option value="Sister">Sister</option>
                                                    <option value="Son">Son</option>
                                                    <option value="Step Family">Step Family</option>
                                                    <option value="Uncle">Uncle</option>
                                                    <option value="Wife">Wife</option>
                                                    <option value="Other" data-code="other">Other</option>
                                                    <option value="No relationship">No relationship</option>
                                                </datalist>

                                            </div>

                                            <div class="form-group">
                                                <label name="memorial_designation"
                                                    for="exampleFormControlSelect1">Memorial
                                                    Designation</label>
                                                <select class="form-control" name="memorial_designation" required
                                                    id="exampleFormControlSelect1">
                                                    <!-- <option value="" selected="" disabled=""
                                                        hidden="">
                                                        Select designation, if applies </option> -->
                                                    <option value="does_not_apply">Does not apply </option>
                                                    <option value="military">Military Veteran </option>
                                                    <option value="first_responder">First Responder </option>
                                                    <option value="covid">Bishop</option>
                                                    <option value="covid">Reverend</option>
                                                    <option value="covid">Imam</option>
                                                    <option value="covid">Father</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Life<i class="fa fa-asterisk staring"
                                                        aria-hidden="true"></i> (Write A Few Words On The
                                                    Life/Birth Of This Person)</label>
                                                <textarea rows="5" id="summary_ckeditor" name="life_tab_arr" class="ckeditor form-control form-group txtar"
                                                    placeholder="Write A Few Words On The Life/Birth Of The Deceased" required></textarea>
                                                {{-- <div onclick="get_ck_editor_val()">Get val</div> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image<i class="fa fa-asterisk staring"
                                                        aria-hidden="true"></i> (Attach A Picture Regarding The
                                                    Life/Birth Of This Person)</label>
                                                <input type="file" accept="image/*"
                                                    class="form-control prof_box crop_upload_image" image_width="378"
                                                    image_height="226" aspect_ratio_width="16"
                                                    aspect_ratio_height="9" upload_input_by_name="life_image"
                                                    required>
                                            </div>


                                            <h5>More Details</h5>
                                            <div class="detailcard">
                                                <!-- <p>This information can also be updated at a later time:</p> -->

                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <p>Born<i class="fa fa-asterisk staring"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="date" name="b_year" class="form-control"
                                                                id="exampleFormControlSelect1" required>

                                                        </div>

                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <input type="text" name="b_city" class="form-control"
                                                                placeholder="City or Town" required>

                                                        </div>

                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <input name="b_state" type="text" class="form-control"
                                                                placeholder="State or Area" required>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <input name="b_country" type="text"
                                                                class="form-control" placeholder="Country" required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <p>Passed away</p>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="date" name="p_year" class="form-control"
                                                                id="exampleFormControlSelect1">

                                                        </div>

                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <input type="text" name="p_city" class="form-control"
                                                                placeholder="City or Town">

                                                        </div>

                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <input name="p_state" type="text" class="form-control"
                                                                placeholder="State or Area">
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <input name="p_country" type="text"
                                                                class="form-control" placeholder="Country">
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                            <h2>Memorial web address:</h2>

                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <label for="exampleFormControlInput1">Memorial Name<i
                                                            class="fa fa-asterisk staring"
                                                            aria-hidden="true"></i></label>
                                                    <input name="memorial_name" type="text" class="form-control"
                                                        id="exampleFormControlInput1"
                                                        placeholder="Write A Unique Memorial Name" required>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="examplemail">
                                                        <p>@4evermemorial.com</p>
                                                    </div>
                                                </div>

                                            </div>


                                            {{-- <a data-toggle="tab" href="#menu2"> --}}
                                            <div onclick="validate_submit_form('.create_memorial_form','create_memorial')"
                                                class="btn btn-primary contclik">Continue
                                            </div>
                                            {{-- </a> --}}
                                        </form>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade">

                                    <!-- Add this header to explain the packages -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="package-intro">
                                                <h3>Choose Your Memorial Capacity</h3>
                                                <p>All packages include our complete set of memorial services - select based on how many memorial pages you need</p>
                                                <p class="billing-note"><i class="fa fa-info-circle"></i> All plans are yearly subscriptions</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="plandata">
                                            <h4>STANDARD PLAN</h4>
                                            <div class="pricing">
                                                <div class="price">$49.99<span class="period">/year</span></div>
                                                <div class="memorial-count-badge">15 Memorial Pages</div>
                                            </div>
                                            <div class="mincardboxhght">
                                                <p>Complete Memorial Platform Access <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>All Premium Features Included <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>Perfect for Individual or Small Family Use <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>Full Service Memorial Creation <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                            </div>

                                            <div class="inerpkgclick">
                                                <button onclick="submit_update_plan(1,49.99)" class="btn btn-primary banclick">Select 15 Memorials - $49.99/year</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="plandata popular-package">
                                            <div class="popular-badge">BEST VALUE</div>
                                            <h4>PREMIUM PLAN</h4>
                                            <div class="pricing">
                                                <div class="price">$99.99<span class="period">/year</span></div>
                                                <div class="memorial-count-badge">30 Memorial Pages</div>
                                            </div>
                                            <div class="mincardboxhght">
                                                <p>Complete Memorial Platform Access <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>All Premium Features Included <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>Ideal for Extended Family Memorials <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>Twice the Capacity of Standard <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                            </div>

                                            <div class="inerpkgclick">
                                                <button onclick="submit_update_plan(2,99.99)" class="btn btn-primary banclick">Select 30 Memorials - $99.99/year</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="plandata">
                                            <h4>PREMIUM PLUS</h4>
                                            <div class="pricing">
                                                <div class="price">$149.99<span class="period">/year</span></div>
                                                <div class="memorial-count-badge">50 Memorial Pages</div>
                                            </div>
                                            <div class="mincardboxhght">
                                                <p>Complete Memorial Platform Access <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>All Premium Features Included <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>Perfect for Larger Families & Communities <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>Significant Capacity for Multiple Generations <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                            </div>

                                            <div class="inerpkgclick">
                                                <button onclick="submit_update_plan(3,149.99)" class="btn btn-primary banclick">Select 50 Memorials - $149.99/year</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="plandata">
                                            <h4>VIP PREMIUM PLUS</h4>
                                            <div class="pricing">
                                                <div class="price">$199.99<span class="period">/year</span></div>
                                                <div class="memorial-count-badge">80 Memorial Pages</div>
                                            </div>
                                            <div class="mincardboxhght">
                                                <p>Complete Memorial Platform Access <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>All Premium Features Included <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>Maximum Capacity for Extensive Memorial Needs <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                                <p>Unlimited Access to All Memorial Features <span class="sidetick"><i class="fa fa-check-circle" aria-hidden="true"></i></span></p>
                                            </div>

                                            <div class="inerpkgclick">
                                                <button onclick="submit_update_plan(4,199.99)" class="btn btn-primary banclick">Select 80 Memorials - $199.99/year</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add this footer to reinforce the message -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="package-footer">
                                                <p><strong>All plans include:</strong> Secure password access, biography pages, flower donation features, image galleries, tribute pages, anniversary reminders, family linking, and all memorial services.</p>
                                                <p class="savings-note"><i class="fa fa-tag"></i> Premium plan offers the best value at just $3.33 per memorial</p>
                                                <hr>
                                                <p><strong>Want to start now?</strong> Continue without paying to create a memorial today. It will remain active for 15 days.</p>
                                                <button type="button" class="btn btn-default" onclick="continue_without_paying()">Continue without paying (15-day trial)</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    <div class="cardformarea option">
                                        <form action="{!! asset('user/memorial/privacy') !!}" id="privacy_form" method="post">
                                            {!! csrf_field() !!}

                                            <h2>Privacy options:</h2>
                                            <p>Would you like to share your memorial with others, or keep it private?
                                            </p>
                                            {{-- <span class="braketdata">(This can be changed later.)</span><br> --}}
                                            <div class="form-group form-check memoreadio">
                                                <input name="all_visitors" value="1" type="checkbox"
                                                    class="form-check-input only_one_check" id="exampleCheck1"
                                                    onclick="onlyOne(this)">
                                                <div class="optrad">
                                                    <h6>All visitors can view and contribute.</h6>
                                                    <p>Recommended for most memorials. This option allows easy access to
                                                        the
                                                        website and
                                                        facilitates collaboration.</p>
                                                </div>
                                            </div>
                                            <div class="form-group form-check memoreadio">
                                                <input name="only_me" value="1" type="checkbox"
                                                    class="form-check-input only_one_check" id="exampleCheck1"
                                                    onclick="onlyOne(this)">
                                                <div class="optrad">
                                                    <h6>Visible only to me.</h6>
                                                    <p>Choose this option if you do not want the memorial to be visible
                                                        to
                                                        others at this time.</p>
                                                </div>
                                            </div>
                                            <div class="form-group form-check confi">
                                                <input name="agreement" value="1" type="checkbox"
                                                    class="form-check-input" id="exampleChaeck1"
                                                    onchange="activateButton(this)">
                                                <label class="form-check-label" for="">I agree to <a
                                                        href="{!! asset('/user/service_term') !!}"><span class="linktext">Terms of
                                                            Use</span></a></label>
                                            </div>
                                            <?php
                                            
                                            $chk_agree = 'disabled';
                                            
                                            ?>
                                            <!-- <a href="{!! asset('user/template/select_template/{user_website}') !!}">  </a> -->
                                            <input type="hidden" name="memorial_id" class="memorial_id">
                                            <button type="submit" onclick="agree_privacy_policy()" class="btn btn-primary contclik"
                                                id="submit">Continue</button>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('user.partial.payment_modal')
    </section>


    @include('layouts.myapp_js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        // var data = CKEDITOR.instances.editor1.getData();

        var user_memorial = null;

        function get_ck_editor_val() {
            var my_memorial = CKEDITOR.instances['summary_ckeditor'].getData();
            var c1 = CKEDITOR.instances["summary_ckeditor"];
            var c2 = CKEDITOR.instances["textarea-id"];

            console.log('its ckeditor', c1);
            console.log('not ckeditor', c2);
            console.log('my_memorial', my_memorial);
            return false;
        }

        function create_memorial(memorial_form, response) {
            try {
                var my_memorial = CKEDITOR.instances['summary_ckeditor'].getData();
                console.log('my_memorial', my_memorial);
                console.log('res 1', response);

                if (response.status) {
                    console.log('res 2', response);
                    user_memorial = response.response.user_memorial;
                    $('.memorial_id').val(user_memorial.id);
                    open_payment_plan_select();
                } else {
                    console.log('res1111sss',  response.error.message);
                    var error_msg = response?.error?.message?.[0] ?? 'Error creating memorial, contact admin';
                    openErrorModal(error_msg);
                }
            } catch (err) {
                console.log('wwwrrrrrrrres1111sss',  response.error.message);
                var error_msg = response?.error?.message?.[0] ?? 'Error creating memorial, contact admin';
                openErrorModal(error_msg);
            }
        }

        function openErrorModal(errorMessage) {
            $('#error-message').text(errorMessage);
            $('#errorModal').modal('show');
        }

        function agree_privacy_policy() {
            document.getElementById('privacy_form').submit();
        }

        // function submit_update_plan(selected_plan_id, price) {
        //     if (paymentInProgress) {
        //         return; // Prevent multiple submissions
        //     }
            
        //     $('#plan_id').val(selected_plan_id);
        //     showPaymentIframe();
            
        //     // Submit the form to the iframe
        //     setTimeout(function() {
        //         document.getElementById('update_plan_form').submit();
        //         paymentInProgress = true;
        //     }, 500);
        // }

        // function showPaymentIframe() {
        //     $('#paymentOverlay').show();
        //     $('#paymentLoading').show();
        //     $('#paymentIframe').hide();
        //     $('#paymentSuccess').hide();
            
        //     // Listen for iframe load events
        //     $('#paymentIframe').on('load', function() {
        //         $('#paymentLoading').hide();
        //         $('#paymentIframe').show();
                
        //         // Check if payment is successful (you'll need to implement this based on your payment processor)
        //         checkPaymentStatus();
        //     });
        // }

        // function checkPaymentStatus() {
        //     // This function should check if payment was successful
        //     // You'll need to implement this based on your payment processor's API
        //     // For demonstration, I'm using a timeout to simulate payment completion
            
        //     // Simulate checking payment status every 2 seconds
        //     var checkInterval = setInterval(function() {
        //         try {
        //             // Try to access iframe content (this might be blocked by same-origin policy)
        //             var iframe = document.getElementById('paymentIframe');
        //             var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                    
        //             // Look for success indicators in the iframe
        //             // This is just an example - adjust based on your payment processor
        //             if (iframeDoc.body.innerHTML.includes('success') || 
        //                 iframeDoc.body.innerHTML.includes('thank you') ||
        //                 iframeDoc.body.innerHTML.includes('payment successful')) {
                        
        //                 clearInterval(checkInterval);
        //                 showPaymentSuccess();
        //             }
        //         } catch (e) {
        //             // Cross-origin restriction - use alternative method
        //             // You might need to implement server-side webhooks or polling
        //             console.log('Cannot access iframe content due to security restrictions');
        //         }
        //     }, 2000);
            
        //     // Fallback: if we can't check the iframe content, assume success after 10 seconds
        //     setTimeout(function() {
        //         clearInterval(checkInterval);
        //         showPaymentSuccess();
        //     }, 10000);
        // }

        // function showPaymentSuccess() {
        //     $('#paymentIframe').hide();
        //     $('#paymentSuccess').show();
            
        //     // Wait 5 seconds then close the iframe and redirect
        //     setTimeout(function() {
        //         closePayment();
        //         // Redirect to next page or show success message
        //         window.location.href = '{!! route('user.memorialform') !!}?payment_success=1&memorial_id=' + $('.memorial_id').val();
        //     }, 5000);
        // }

        // function closePayment() {
        //     $('#paymentOverlay').hide();
        //     paymentInProgress = false;
        // }

        function open_tab(res) {
            console.log('res', res);
        }

        function onlyOne(checkbox) {
            var checkboxes = $('.only_one_check');
            console.log('checkboxes', checkboxes);
            checkboxes.each((index, item) => {
                console.log('item', item);
                if (item !== checkbox) item.checked = false
            })
        }

        function disableSubmit() {
            document.getElementById("submit").disabled = true;
        }

        function activateButton(element) {
            if (element.checked) {
                document.getElementById("submit").disabled = false;
            } else {
                document.getElementById("submit").disabled = true;
            }
        }

        function validate_submit_form(form_selector, sucess_function) {
            var valid_form = true;
            $(form_selector).find('input').each(function() {
                if ($(this).prop('required') && $.trim($(this).val()).length === 0) {
                    console.log('err name', $(this).attr('name'));
                    console.log('err name', $.trim($(this).val().length));
                    console.log('err name', $(this).attr('name'));
                    $(this).addClass('required-warning');
                    valid_form = false;
                }
            });
            if (valid_form) {
                submit_form(form_selector, sucess_function);
            }
        }

        function open_payment_plan_select() {
            window.scrollTo(0, 400);
            $('.nav-tabs a[href="#menu2"]').tab('show');
        }

        function continue_without_paying() {
            var memorialId = $('.memorial_id').val();
            if (!memorialId) {
                openErrorModal('Please complete About Your Loved One first.');
                return;
            }
            $.ajax({
                method: 'POST',
                url: '{!! asset("user/memorial/start-trial") !!}',
                data: { memorial_id: memorialId, _token: '{{ csrf_token() }}' },
                dataType: 'JSON',
                success: function(resp) {
                    try { resp = (typeof resp === 'string') ? JSON.parse(resp) : resp; } catch(e) {}
                    if (resp && resp.status) {
                        window.location = '{!! route("user.memorialform") !!}?open_privacy=1&memorial_id=' + memorialId;
                    } else {
                        openErrorModal((resp && resp.error && resp.error.message && resp.error.message[0]) || 'Could not start trial. Try again.');
                    }
                },
                error: function() {
                    openErrorModal('Could not start trial. Try again.');
                }
            });
        }

        $(function() {
            var params = new URLSearchParams(window.location.search);
            if (params.get('open_privacy') === '1') {
                var mid = params.get('memorial_id');
                if (mid) {
                    $('.memorial_id').val(mid);
                }
                window.scrollTo(0, 400);
                $('.nav-tabs a[href="#menu3"]').tab('show');
            }
        });
    </script>

</body>

</html>