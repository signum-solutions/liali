<!DOCTYPE html>
<html lang="en">

<head lang="en">
    <title>Signum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Signum"/>
    <meta name="keywords" content="Signum">
    <meta name="author" content="Signum"/>

    <base target="_self" href="">

    <!-- Favicon icon -->
    <link rel="icon" href="https://www.signumsolutions.tech/lmad/public/assets/images/favicon.png" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Framework -->
    <link rel="stylesheet" type="text/css"
          href="https://www.signumsolutions.tech/lmad/public/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="https://www.signumsolutions.tech/lmad/public/assets/pages/waves/css/waves.min.css"
          type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css"
          href="https://www.signumsolutions.tech/lmad/public/assets/icon/feather/css/feather.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css"
          href="https://www.signumsolutions.tech/lmad/public/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css"
          href="https://www.signumsolutions.tech/lmad/public/assets/icon/icofont/css/icofont.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css"
          href="https://www.signumsolutions.tech/lmad/public/assets/css/font-awesome-n.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="https://www.signumsolutions.tech/lmad/public/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://www.signumsolutions.tech/lmad/public/assets/css/pages.css">
    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="https://www.signumsolutions.tech/lmad/public/bower_components/chartist/css/chartist.css"
          type="text/css" media="all">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="https://www.signumsolutions.tech/lmad/public/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://www.signumsolutions.tech/lmad/public/assets/css/widget.css">


    <link rel="stylesheet" href="https://www.signumsolutions.tech/lmad/public/assets/css/custom.css">
    <link rel="stylesheet" href="https://www.signumsolutions.tech/lmad/public/assets/css/style-new.css">

    <!-- Required Jquery -->
    <script type="text/javascript"
            src="https://www.signumsolutions.tech/lmad/public/bower_components/jquery/js/jquery.min.js "></script>
    <script type="text/javascript"
            src="https://www.signumsolutions.tech/lmad/public/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript"
            src="https://www.signumsolutions.tech/lmad/public/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript"
            src="https://www.signumsolutions.tech/lmad/public/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://www.signumsolutions.tech/lmad/public/js/hello.all.js"></script>

    <style>
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px;
            color: #fff;
            font-weight: 600;
            text-align: center;
        }
    </style>
</head>

<body>

<!-- [ Pre-loader ] start -->


<!-- [ Pre-loader ] end -->


<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">


        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">


                <div class="card-block" powerbi-settings-nav-content-pane-enabled="false"
                     style="display:block;height: 600px;width: 100%" id="dashboardContainer35">

                </div>

                <script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/powerbi-client/dist/powerbi.js"></script>
                <script type="text/javascript">

                    window.onload = function () {
                        var embedConfiguration = {
                            type: 'report',
                            accessToken: "{{$data['token']}}",
                            embedUrl: "{{$data['url']}}",
                            id: "{{$data['id']}}",
                            pageName: "{{$data['pageName']}}",
                            settings: {
                                filterPaneEnabled: false,
                                navContentPaneEnabled: false,
                                frameborder: 0,
                                allowFullScreen: true,
                            }
                        };
                        var $reportContainer = $('#dashboardContainer35');
                        var report = powerbi.embed($reportContainer.get(0), embedConfiguration);
                    }

                    function reloadreport() {
                        var element = $('#dashboardContainer35');
                        alert(element);
                        var report = powerbi.get(element);
                        report.reload().catch(error => {
                            console.log(error)
                        });
                    };
                </script>

            </div>
        </div>
    </div>
</div>


</body>
</html>