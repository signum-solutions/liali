<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade
        <br/>to any of the following web browsers to access this website.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{ asset('assets/images/browser/chrome.png') }}" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{ asset('assets/images/browser/firefox.png') }}" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{ asset('assets/images/browser/opera.png') }}" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{ asset('assets/images/browser/safari.png') }}" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{ asset('assets/images/browser/ie.png') }}" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->

<!-- waves js -->
<script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/accordion/accordion.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

<!-- Custom js -->
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/vertical/vertical-layout.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('assets/pages/dashboard/crm-dashboard.min.js') }}"></script>
 -->
<script type="text/javascript" src="{{ asset('assets/js/script.min.js') }}"></script>

<!-- Custom js -->
<!-- <script type="text/javascript" src="{{ asset('assets/pages/chart/chartlist/chartlist-custom.js') }}"></script> -->
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>

<!-- toastr js libraries for js and css -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js "></script>
<!--./toastr js libraries for js and css -->

<!-- Sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>


<!-- Toastr js for whole project starts -->
<script>
    @if(Session::has('alert-type'))
        var type = '<?php echo Session::get('alert-type'); ?>';

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
<!-- Toastr js for whole project ends -->


<script class="pre">
    function windows_logout() {
        hello('windows').logout().then(function() {
            window.location = "{{ env('APP_URL') }}user/logout";
        }, function(e) {
            alert('Signed out error: ' + e.error.message);
        });
    }
</script>

<!--script>
	$(document).ready(function() {
		$(".pcoded-navbar .nav-list").mouseenter(function() {
			$(".pcoded-navbar .nav-list").width(250);
			$(".pcoded-mtext").fadeIn();

		});
		$(".pcoded-navbar .nav-list").mouseleave(function() {
			$(".pcoded-navbar .nav-list").width(60);
			$(".pcoded-mtext").fadeOut();
		});
	});
</script-->

<script>
	$(document).ready(function() {
		$(".pcoded-navbar .nav-list").mouseenter(function() {
			$(".pcoded-navbar").width(250);
			$(".pcoded-mtext").show();

		});
		$(".pcoded-navbar .nav-list").mouseleave(function() {
			$(".pcoded-navbar").width(60);
			$(".pcoded-mtext").hide();
		});
	});
</script>
			


<a id="back2Top" title="Back to top" href="#">&#10148;</a>
