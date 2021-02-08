<!-- [ Header ] start -->
<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a href="{{ url('/') }}">
                {{--<script type="text/javascript" src="https://ajax.cloudflare.com/cdn-cgi/scripts/04b3eb47/cloudflare-static/mirage2.min.js"></script>--}}
                <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="" />
            </a>
        <!--    <a class="mobile-menu" id="mobile-collapse" href="#!"> <i class="feather icon-menu icon-toggle-right"></i> </a>
            <a class="mobile-options waves-effect waves-light"> <i class="feather icon-more-horizontal"></i> </a> -->
        </div>
        <div class="navbar-container container-fluid">
            
            <ul class="nav-left">
								<div class="input-group">
								<span class="input-group-prepend" style="width: 550px;margin-left: 181px;"> <i class="feather icon-search"></i>
										<input type="text" id="search" class="form-control" placeholder="Search.....!">
								</span></div>
							</ul>
							<style>
								.nav-left {
									margin: 15px 10px;
								}
								.nav-left .input-group {
									margin: 0px;
								}
								.nav-left .icon-search {
									padding: 8.64px 0 8.64px 6.4px;
									border: 1px solid #ccc;
									border-right: 0px;
								}
								.nav-left #search {
									border-left: 0px;
								}
								.nav-left input:focus, .nav-left input:active, .nav-left input:hover {
									box-shadow: none;
									border: 1px solid #ccc;
								}
							</style>
							
							
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-bell"></i>
                            <span class="badge bg-c-red">5</span>
                        </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            <li>
                                <div class="media">
                                    <img class="img-radius" data-cfsrc="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image" style="display:none;visibility:hidden;">
                                    <noscript><img class="img-radius" src="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                                    </noscript>
                                    <div class="media-body">
                                        <h5 class="notification-user">John Doe</h5>
                                        <p class="notification-msg">
                                            Lorem ipsum dolor sit amet, consectetuer elit.
                                        </p>
                                        <span class="notification-time">30 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <img class="img-radius" data-cfsrc="{{ asset('assets/images/avatar-3.jpg') }}" alt="Generic placeholder image" style="display:none;visibility:hidden;">
                                    <noscript><img class="img-radius" src="{{ asset('assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
                                    </noscript>
                                    <div class="media-body">
                                        <h5 class="notification-user">Joseph William</h5>
                                        <p class="notification-msg">
                                            Lorem ipsum dolor sit amet, consectetuer elit.
                                        </p>
                                        <span class="notification-time">30 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <img class="img-radius" data-cfsrc="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image" style="display:none;visibility:hidden;">
                                    <noscript><img class="img-radius" src="{{ asset('assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
                                    </noscript>
                                    <div class="media-body">
                                        <h5 class="notification-user">Sara Soudein</h5>
                                        <p class="notification-msg">
                                            Lorem ipsum dolor sit amet, consectetuer elit.
                                        </p>
                                        <span class="notification-time">30 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-message-square"></i>
                            <span class="badge bg-c-green">3</span>
                        </div>
                    </div>
                </li>
                <li class="user-profile header-notification">

                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img data-cfsrc="{{ asset('assets/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image" style="display:none;visibility:hidden;">
                            <noscript><img src="{{ asset('assets/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                            </noscript>
                            <span>John Doe</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="#"> <i class="feather icon-settings"></i> Settings </a>
                            </li>
                            <li>
                                <a href="#"> <i class="feather icon-user"></i> Profile </a>
                            </li>
                            <li>
                                <a href="#"> <i class="feather icon-mail"></i> My Messages </a>
                            </li>
                            <li>
                                <a href="#"> <i class="feather icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                @if(isset($data['user_type']) && ($data['user_type'] == 'admin'))
                                    <a href="{{ url('/admin/logout') }}"> <i class="feather icon-log-out"></i> Logout </a>
                                @else
                                    {{--<a href="javascript:void(0)" onclick="windows_logout()"> <i class="feather icon-log-out"></i> Logout </a>--}}
                                    <a href="{{ url('signout') }}"> <i class="feather icon-log-out"></i> Logout </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
