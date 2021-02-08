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
          

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                
                    @yield('content')
                </div>
            </div>
        </div>
    </div>



</body>
</html>