<style>
    .search_area button {
        background: none;
        color: white;
        border: none;
        padding-top: 10px;
    }

    .search_area {
        display: flex;
    }

    .topicons .profile-link,
    .topicons .logout-link {
        margin-left: 15px;
        color: #333;
        text-decoration: none;
        font-size: 14px;
    }

    .topicons .profile-link:hover,
    .topicons .logout-link:hover {
        color: #007bff;
        text-decoration: none;
    }

    .topicons .profile-link i,
    .topicons .logout-link i {
        margin-right: 5px;
    }

    i.fa.fa-user-circle-o.prof_icon {
        font-size: 30px;
        margin: 11px;
    }

    a.logo_btn {
        font-size: 17px;
        margin-left: 10px;
        align-content: center;
    }
</style>
<div class="container top">
    <div class="row hidden-xs">
        <div class="col-sm-4">
            <div class="logoarea">
                <img src="{!!asset('public/images/logo.png')!!}" class="img-responsive">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="topinput">
                <form method="post" action="{!!asset('search/memorial')!!}">
                    {!! csrf_field() !!}
                    <div class="search_area">
                        <input type="text" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                            placeholder="Find a Memorial">
                        <button><i class="fa fa-search icon_c" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>

        @php
        $signin = '';
        $signout = '';
        if (Auth::user()) {
        // dd('asddsdaasdasdsdaasassd');
        $signin = "display: block;";
        $signout = "display: none;";
        }
        else{
        $signin = "display: none;";
        $signout = "display: block;";
        }
        @endphp
        <div class="col-sm-4">
            <div class="topicons">
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <i class="fa fa-user-plus" style="{!!$signout!!}" aria-hidden="true" data-toggle="modal" data-target="#remodal"> Registration</i>
                <i class="fa fa-sign-in" style="{!!$signout!!}" aria-hidden="true" data-toggle="modal" data-target="#LoginModalCenter"> SignIn</i>

                <!-- Corrected Profile Link -->
                <a href="{!!asset('user/profile')!!}" class="profile-link" style="{!!$signin!!}">
                    <i class="fa fa-user-circle-o prof_icon" aria-hidden="true"></i>
                </a>

                <a class="logo_btn" href="{!!asset('user/logout')!!}" style="{!!$signin!!}"> LogOut </a>
            </div>
        </div>
    </div>
</div>
<div class="menucont">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-xs-12 visible-xs">
                <div class="logoArea">
                    <a href="/"><img src="{!!asset('public/images/logo.png')!!}" class="img-responsive"></a>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="row mobileNav">
                    <div class="col-xs-4 visible-xs xs-marker"></div>
                    <div class="col-xs-4 visible-xs xs-phone"></div>
                    <div class="col-xs-4 visible-xs">
                        <button data-target=".navbar-collapse" data-toggle="collapse" id="mnav-button"
                            class="navbar-toggle fa fa-bars fa-2x collapsed threebar" type="button">
                        </button>
                    </div>
                </div>
                <?php
                $signin = "data-toggle='modal' data-target='#LoginModalCenter'";
                $profile_url = $signin;
                if (Auth::user()) {
                    $signin = "href='" . asset('user/memorialform') . "'";
                    $profile_url = "href='" . asset('user/profile') . "'";
                }
                $signin_mymemorial = "data-toggle='modal' data-target='#LoginModalCenter'";

                if (Auth::user()) {
                    $signin_mymemorial = "href='" . asset('user/my_memorials') . "'";
                }
                ?>
                <nav>
                    <div class="jump">
                        <div class="navbar-collapse nav-collapse collapse">
                            <ul class="nav navbar-nav navmenu">
                                <li id="1">
                                    <a href="{!!asset('/')!!}"><span>HOME</span></a>
                                </li>
                                <li id="2">
                                    <a href="{!!asset('user/aboutus')!!}"><span>ABOUT</span></a>
                                </li>
                                <li id="3">
                                    <a {!!$signin!!}><span>CREATE A MEMORIAL</span> </a>
                                </li>
                                <li id="4">
                                    <a href="{!!asset('user/plans')!!}"><span>PLANS & FEATURES</span> </a>
                                </li>
                                <li id="5">
                                    <a href="{!!asset('user/testimonials')!!}"><span>TESTIMONIALS</span> </a>
                                </li>
                                <li id="6">
                                    <a href="{!!asset('user/blog')!!}"><span>BLOG</span> </a>
                                </li>
                                <li id="7">
                                    <a href="{!!asset('user/contactus')!!}"><span>CONTACT</span> </a>
                                </li>
                                <li id="8">
                                    <a {!!$signin_mymemorial!!}><span>MY MEMORIALS</span> </a>
                                </li>
                                <!-- <li id="9">
                                  <a {!!$profile_url!!}><span>Profile</span> </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
@php
$signin = '';
$signout = '';
if (Auth::user()) {
// dd('asddsdaasdasdsdaasassd');
$signin = "display: block;";
$signout = "display: none;";
}
else{
$signin = "display: none;";
$signout = "display: block;";
}
@endphp
<div class="col-sm-4">
    <div class="topicons mobile_nav">
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <i class="fa fa-user-plus" style="{!!$signout!!}" aria-hidden="true" data-toggle="modal" data-target="#remodal"> Registration</i>
        <i class="fa fa-sign-in" style="{!!$signout!!}" aria-hidden="true" data-toggle="modal" data-target="#LoginModalCenter"> SignIn</i>
        <!-- <i class="fa fa-user-circle-o"  style="{!!$signin!!}"aria-hidden="true"data-target="#LoginModalCenter"><a href="{!!asset('user/logout')!!}"> LogOut </a></i> -->
        <!-- Profile Link -->
        <a href="http://localhost/4_ever_memories/user/profile" class="profile-link">
            <i class="fa fa-user" aria-hidden="true"></i> Profile
        </a>

        <!-- Logout Link -->
        <a href="http://localhost/4_ever_memories/user/logout" class="logout-link">
            <i class="fa fa-sign-out" aria-hidden="true"></i> LogOut
        </a>
    </div>
</div>

{{-- Sign in modal --}}
<div class="modal fade" id="LoginModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="LoginModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modhead">
                <h5 class="modal-title" id="loginModalLongTitle">Sign in With Your Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <!-- Fixed: Use data-bs-toggle and data-bs-dismiss with proper Bootstrap 5 syntax -->
                            <a class="forgot-password-link" data-toggle="modal" data-target="#forgotPasswordModal" data-dismiss="modal">
                                Forgot Password?
                            </a>
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
                    <form action="{!! asset('forget_password') !!}" method="POST">
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