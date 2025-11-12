@extends('user_layout.main_header_footer')


    @section('title')
<title>4Year Project</title>
@endsection
    @section('headerfiles')
    <link rel="icon" type="image/png" sizes="16x16" href="{!!asset('public/images/favicon.png')!!}" />
    <link href="{!!asset('public/css/main.css')!!}" rel="stylesheet">
    <link href="{!!asset('public/css/plan_features.css')!!}" rel="stylesheet">
    @endsection
    @section('body')
    <section>
        <div class="planbanner">
            @include('user_layout.components.banner_menu')
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bannerdata aboutheading">
                            <h1>PLANS & FEATURES</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    // dd(Auth::user());
                
                            $signin_buy = "data-toggle='modal' data-target='#LoginModalCenter'";

                        if (Auth::user()) {
                            $signin_buy = "href='".asset('#')."'";
                            $signin_buy = "";
                        }
                        ?>
    <section>
        <div class="testdataarea">
            <div class="container">
                <div class="row">
                    <h3>MEMORIAL PACKAGES</h3>
                    <div class="col-sm-12">
                        <div class="plandata">
                            <h4>STANDARD (15 MEMORIAL PAGES)</h4>
                            <p>Highly Secure With Password Login Access <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Decease Bio <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Flower Donation Page <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Image Gallery <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <div class="inerpkgclick">
                                <button type="submit" onclick="submit_update_plan(1,49.99)" {!!$signin_buy!!} class="btn btn-primary banclick">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 topspace">
                        <div class="plandata">
                            <h4>PREMIUM (30 MEMORIAL PAGE)</h4>
                            <p>All in Standard And Biography of Deceased And Family Members <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Automated Anniversary Reminder <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Virtual Anniversary Organize By 4Ever (Extra Cost) <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Tribute Notes And Letters By Friends <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <div class="inerpkgclick">
                                <button type="submit" onclick="submit_update_plan(2,99.99)" {!!$signin_buy!!} class="btn btn-primary banclick">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 topspace">
                        <div class="plandata">
                            <h4>PREMIUM PLUS (50 MEMORIAL PAGE)</h4>
                            <p>All in Standard And Premium Including <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Tribute Page For Message From Family And Friends <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Grave Yard Image On Top Of The Page <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Link To Physical Grave Site <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Link Memorials Of Relative To Their Pages, Example <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>A. Wife Page Link To Husband Or Husband Page Link Wife <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>B. Husband Or Wife Memorials Merge Together <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <div class="inerpkgclick">
                                <button type="submit" onclick="submit_update_plan(3,149.99)" {!!$signin_buy!!} class="btn btn-primary banclick">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 topspace">
                        <div class="plandata">
                            <h4>VIP PREMIUM PLUS (80 MEMORIAL PAGE)</h4>
                            <p>(All in Premium Plus) <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Customized Dedicated Page <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Highly Secure Login Access <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>And All in Premium Plus <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <p>Search By Name For A Brief Information <span class="sidetick"><i class="fa fa-check" aria-hidden="true"></i></span></p>
                            <div class="inerpkgclick">
                                <button type="submit" onclick="submit_update_plan(4,199.99)" {!!$signin_buy!!} class="btn btn-primary banclick">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 @include('user.partial.payment_modal')
    @endsection

<script>
    
function openErrorModal(errorMessage) {
    $('#error-message').text(errorMessage);
    $('#errorModal').modal('show');
}
</script>



     
