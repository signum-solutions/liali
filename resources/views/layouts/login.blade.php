<!DOCTYPE html>
<html lang="en">

<head lang="en">
    @include('includes.header')
</head>

{{--@if(!empty($data['session_user_id'])) --}}
    {{--<body themebg-pattern="theme1" onload="directwindowslogin('windows')">--}}
{{--@else--}}

<body themebg-pattern="theme1">
{{--@endif--}}

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    <p class="mb-3">{{ session('error') }}</p>
                    @if(session('errorDetail'))
                        <pre class="alert-pre border bg-light p-2"><code>{{ session('errorDetail') }}</code></pre>
                    @endif
                </div>
            @endif

            @yield('content')
        </div>
    </section>

    @include('includes.footer')

    @yield('page_js_resource')

</body>
</html>