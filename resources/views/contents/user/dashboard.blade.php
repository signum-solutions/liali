@extends('layouts.default')
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->

        <!-- [ breadcrumb ] end -->
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <!-- [ page content ] start -->
                        <div class="row">
                            <!--      <div class="col-lg-12 col-xl-12">
                                      <div class="card">
                                          <ul class="nav nav-tabs md-tabs" role="tablist">
                                              <li class="nav-item">
                                                  <a class="nav-link active show" data-toggle="tab" href="#home3" role="tab" aria-selected="false">Sales</a>
                                                  <div class="slide"></div>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-selected="false">Inventory</a>
                                                  <div class="slide"></div>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#messages3" role="tab" aria-selected="false">Purchase</a>
                                                  <div class="slide"></div>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#settings3" role="tab" aria-selected="false">Finance</a>
                                                  <div class="slide"></div>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" data-toggle="tab" href="#settings3" role="tab" aria-selected="false">CRM</a>
                                                  <div class="slide"></div>
                                              </li>
                                          </ul>

                                      </div>
                                      </div> -->
                            <div class="col-lg-12 col-xl-12">

                                <div class="col-lg-12 col-xl-12">
                                    <div class="card">

                                        <div class="card-block" style="display:none;height: 200px">
                                            <div id="embedContainer"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-block" style="display:block;height: 400px" id="dashboardContainer">
                                        <!--  <iframe width="100%" height="320"
                                                 src="https://app.powerbi.com/reportEmbed?reportId=3daeec4f-fef9-47fa-b012-0f046e699367&autoAuth=true&pageName=ReportSection8dfe45042d52b5d217ee&filterPaneEnabled=false&navContentPaneEnabled=false"
                                                 frameborder="0"
                                                 allowFullScreen="true"></iframe> -->
                                    </div>
                                </div>
                            </div>
                            <!-- product profit start -->
                        </div>

                        <div class="row">


                            <!-- lattest update, new client start -->
                            <div class="col-xl-6 col-md-12">
                                <div class="card latest-update-card">
                                    <div class="card-header">
                                        <h5>Promotion</h5>
                                    </div>
                                    <div class="card-block" style="
    padding: 17px;
">

                                        <div class="latest-update-box">
                                            <div class="row p-b-30 p-t-20">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="feather icon-briefcase bg-c-red update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!"><img
                                                                src="{{ asset('assets/images/slider/slider5.jpg') }}"
                                                                class="img-responsive" width="100%"/>
                                                        <div class="centered">
                                                            Positive Thinking
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="feather icon-check f-w-600 bg-c-green update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="#!"><img
                                                                src="{{ asset('assets/images/slider/slider6.jpg') }}"
                                                                class="img-responsive" width="100%"/>
                                                        <div class="centered">
                                                            Thinking Positive
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="row">
                                    <!--   <div class="col-xl-6 col-md-12">
                                           <div class="card comp-card">
                                               <div class="card-body">
                                                   <div class="row align-items-center">
                                                       <div class="col">
                                                           <h6 class="m-b-25">Impressions</h6>
                                                           <h3 class="f-w-700 text-c-blue">1,563</h3>
                                                           <p class="m-b-0">
                                                               May 23 - June 01 (2017)
                                                           </p>
                                                       </div>
                                                       <div class="col-auto">
                                                           <i class="fas fa-eye bg-c-blue"></i>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-xl-6 col-md-6">
                                           <div class="card comp-card">
                                               <div class="card-body">
                                                   <div class="row align-items-center">
                                                       <div class="col">
                                                           <h6 class="m-b-25">Goal</h6>
                                                           <h3 class="f-w-700 text-c-green">30,564</h3>
                                                           <p class="m-b-0">
                                                               May 23 - June 01 (2017)
                                                           </p>
                                                       </div>
                                                       <div class="col-auto">
                                                           <i class="fas fa-bullseye bg-c-green"></i>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-xl-6 col-md-6">
                                           <div class="card comp-card">
                                               <div class="card-body">
                                                   <div class="row align-items-center">
                                                       <div class="col">
                                                           <h6 class="m-b-25">Goal</h6>
                                                           <h3 class="f-w-700 text-c-green">30,564</h3>
                                                           <p class="m-b-0">
                                                               May 23 - June 01 (2017)
                                                           </p>
                                                       </div>
                                                       <div class="col-auto">
                                                           <i class="fas fa-bullseye bg-c-green"></i>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-xl-6 col-md-6">
                                           <div class="card comp-card">
                                               <div class="card-body">
                                                   <div class="row align-items-center">
                                                       <div class="col">
                                                           <h6 class="m-b-25">Impact</h6>
                                                           <h3 class="f-w-700 text-c-yellow">42.6%</h3>
                                                           <p class="m-b-0">
                                                               May 23 - June 01 (2017)
                                                           </p>
                                                       </div>
                                                       <div class="col-auto">
                                                           <i class="fas fa-hand-paper bg-c-yellow"></i>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>   -->

                                    <div class="col-xl-12 col-md-12">
                                        <div class="card new-cust-card">
                                            <div class="card-header">
                                                <h5>Recent Conversation</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li class="first-opt">
                                                            <i class="feather icon-chevron-left open-card-option"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-maximize full-card"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-minus minimize-card"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-refresh-cw reload-card"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-trash close-card"></i>
                                                        </li>
                                                        <li>
                                                            <i class="feather icon-chevron-left open-card-option"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="align-middle m-20">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-2.jpg') }}"
                                                         alt="user image" class="img-radius img-40 align-top m-r-15"
                                                         style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-2.jpg') }}"
                                                                   alt="user image"
                                                                   class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-20">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-3.jpg') }}"
                                                         alt="user image" class="img-radius img-40 align-top m-r-15"
                                                         style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-3.jpg') }}"
                                                                   alt="user image"
                                                                   class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            stay hungry stay foolish!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-20">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-3.jpg') }}"
                                                         alt="user image" class="img-radius img-40 align-top m-r-15"
                                                         style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-3.jpg') }}"
                                                                   alt="user image"
                                                                   class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status deactive text-mute"><i
                                                                    class="far fa-clock m-r-10"></i>30 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-20">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-4.jpg') }}"
                                                         alt="user image" class="img-radius img-40 align-top m-r-15"
                                                         style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-4.jpg') }}"
                                                                   alt="user image"
                                                                   class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status deactive text-mute"><i
                                                                    class="far fa-clock m-r-10"></i>10 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-20">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-2.jpg') }}"
                                                         alt="user image" class="img-radius img-40 align-top m-r-15"
                                                         style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-2.jpg') }}"
                                                                   alt="user image"
                                                                   class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            stay hungry stay foolish!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-20">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-2.jpg') }}"
                                                         alt="user image" class="img-radius img-40 align-top m-r-15"
                                                         style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-2.jpg') }}"
                                                                   alt="user image"
                                                                   class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-20">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-2.jpg') }}"
                                                         alt="user image" class="img-radius img-40 align-top m-r-15"
                                                         style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-2.jpg') }}"
                                                                   alt="user image"
                                                                   class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                                <div class="align-middle m-20">
                                                    <img data-cfsrc="{{ asset('assets/images/avatar-2.jpg') }}"
                                                         alt="user image" class="img-radius img-40 align-top m-r-15"
                                                         style="display:none;visibility:hidden;">
                                                    <noscript><img src="{{ asset('assets/images/avatar-2.jpg') }}"
                                                                   alt="user image"
                                                                   class="img-radius img-40 align-top m-r-15">
                                                    </noscript>
                                                    <div class="d-inline-block">
                                                        <a href="#!"><h6>Notifications</h6></a>
                                                        <p class="text-muted m-b-0">
                                                            Cheers!
                                                        </p>
                                                        <span class="status active"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type='hidden' id='txtAccessToken' value='{{$data['embedToken']}}'/>
        <input type='hidden' id='groupId' value='{{$data['groupId']}}'/>
        <input type='hidden' id='reportId' value='{{$data['reportId']}}'/>
        <!-- [ style Customizer ] start -->
        <div id="styleSelector"></div>
        <!-- [ style Customizer ] end -->
    </div>


    <script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/powerbi-client/dist/powerbi.js"></script>


    <script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/jquery/dist/jquery.js"></script>
    <body>


    <script type="text/javascript">

        window.onload = function () {

	    var reportId = "{{$data['reportId']}}";
            var groupId = "{{$data['groupId']}}"; //'71353332-f17d-4cdd-8f82-596afe973c3e';
            var embedToken = "{{$data['embedToken']}}";

            var txtAccessToken = "{{$data['embedToken']}}";;

            var txtEmbedUrl = 'https://app.powerbi.com/reportEmbed?reportId=' + reportId + '&groupId=' + groupId + '';

            var txtEmbedReportId = reportId; // $('#txtEmbedReportId').val();

            var tokenType = $('input:radio[name=tokenType]:checked').val();

            var models = window['powerbi-client'].models;

            var permissions = models.Permissions.All;

            var config = {
                type: 'report',
                tokenType: tokenType == '0' ? models.TokenType.Aad : models.TokenType.Embed,
                accessToken: txtAccessToken,
                embedUrl: txtEmbedUrl,
                id: txtEmbedReportId,
                permissions: permissions,
                settings: {
                    filterPaneEnabled: false,
                    navContentPaneEnabled: false,
                    frameborder: 0,
                    allowFullScreen: true,
                }
            };

            var embedContainer = $('#dashboardContainer')[0];

            var report = powerbi.embed(embedContainer, config);

            report.off("loaded");

            report.on("loaded", function () {
                Log.logText("Loaded");
            });

            report.on("error", function (event) {
                Log.log(event.detail);

                report.off("error");
            });

            report.off("saved");

            report.on("saved", function (event) {
                Log.log(event.detail);
                if (event.detail.saveAs) {
                    Log.logText('In order to interact with the new report, create a new token and load the new report');
                }
            });


        }
    </script>
    <script type="text/javascript">
	/*
        window.onload = function () {
            var embedConfiguration = {
                type: 'report',
                accessToken: "{{$responses['access_token']}}",
                embedUrl: 'https://app.powerbi.com/reportEmbed?reportId=78a82ae0-7da0-4f21-8ece-c55c48129bce&groupId=f7432990-0ae5-438b-888d-e6fb21d3e1ad&autoAuth=true&ctid=abb1edba-da56-4b40-aef5-e45550614d11',
                id: '{78a82ae0-7da0-4f21-8ece-c55c48129bce}',
                settings: {
                    filterPaneEnabled: false,
                    navContentPaneEnabled: false,
                    frameborder: 0,
                    allowFullScreen: true,
                }
            };
            var $reportContainer = $('#dashboardContainer');
            var report = powerbi.embed($reportContainer.get(0), embedConfiguration);
        }

        function reloadreport() {
            var element = $('#dashboardContainer');
            alert(element);
            var report = powerbi.get(element);
            report.reload().catch(error => {
                console.log(error)
            });
        };
	*/
    </script>

@stop