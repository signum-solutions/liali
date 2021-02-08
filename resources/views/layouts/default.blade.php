<!DOCTYPE html>
<html lang="en">

<head lang="en">
    @include('includes.header')
</head>

<body>

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
       
        	<img src="../../../public/assets/images/loader.gif" id="loader">
    </div> 
    
  
    <!-- [ Pre-loader ] end -->
    
    


    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('includes.navbar')
            @include('includes.chat_sidebar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('includes.sidebar')

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')

    @yield('page_js_resource')

</body>
</html>