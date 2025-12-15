@extends('user_layout.main_header_footer')
@section('title')
<title>4 ever memorial About-US</title>
@endsection

@section('headerfiles')
<link href="{!!asset('public/theme/user_theme/css/aboutus.css')!!}" rel="stylesheet">
@endsection

@section('body')
    <section>
        <div class="abouttopbanner">
            @include('user_layout.components.banner_menu')
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bannerdata aboutheading">
                            <h1>ABOUT</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="aboutarea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="aboutdata">
                            <h2>ABOUT US</h2>
                            <p>{!!$about_us[0]->description_first!!} </p>
                            
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="aboutimg">
                            <img src="{!!$about_us[0]->image!!}" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="aboutdata">

                    <p>
                    {!!$about_us[0]->description_second!!}</p>
<img src="{!!asset('public/theme/user_theme/images/signature.png')!!}" class="img-responsive">
                </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="aboutareaa">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="aboutimg">
                            <img src="{!!asset('public/theme/user_theme/images/mission.jpg')!!}" class="img-responsive">
                        </div>
                        <div class="aboutdataa">
                            <h2>VISION</h2>
                            <p>The vision of Iboto Empire: The inspiration, the
                                training and the equipping of the next generation
                                of professionals: using the right tools and the
                                right technological information within their
                                vocational fields; in order to create a lasting,
                                powerful, and global impact-not only for today,
                                but for generations to come.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="aboutdataa">
                            <h2>MISSION</h2>
                            <p>Our mission is to create and build human
                                strategic capacity solutions; solutions that not
                                only promote self-improvement, but that also
                                advance individual development- thus enabling
                                individuals to achieve their set goals and
                                objectives within their chosen career paths.</p>
                        </div>
                        <div class="aboutimg">
                            <img src="{!!asset('public/theme/user_theme/images/vision.jpg')!!}" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection


    