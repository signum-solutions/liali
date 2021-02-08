

@extends('layouts.default')
@section('content')
<div class="pcoded-content">
   <!-- [ breadcrumb ] start -->
   <!--     <div class="page-header card">
      <div class="row align-items-end">
          <div class="col-lg-12">
      
              <div class="page-header-title">
                  <i class="feather icon-layers bg-c-blue"></i>
                  <div class="d-inline">
                      <h5>Reports</h5>
                      <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                  </div>
              </div>
          </div>
      </div>
      </div>  -->
   <!-- [ breadcrumb ] end -->
   <div class="pcoded-inner-content">
      <!-- Main-body start -->
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-body">
               <div class="row">
                  <div class="col-lg-12 col-xl-12">
                     <div class="card" id="main__tab">
                        <ul class="nav nav-tabs md-tabs" role="tablist">
                           @if(isset($data['tab_list']) && !empty($data['tab_list']))
                           @php
                           $l = 1;
                           $k = 1;
                           @endphp
                           {{-- @foreach($data['tab_list'] as $tab) --}}
                           <li class="nav-item">
                              {{-- <a class="nav-link @if($l == 1){{ 'active' }}@endif" data-toggle="tab" href="#tab{{ $tab->category_id }}" role="tab"
                                 aria-selected="false">{{ $tab->name }}</a> --}}
                                 <a class="nav-link active" data-toggle="tab"  role="tab"
                                    aria-selected="false">Branch KPI Evolution</a>
                                 <a class="nav-link"></a>
                              <div class="slide"></div>
                           </li>
                           @php
                           $l++;
                           @endphp
                           {{-- @endforeach --}}
                           @endif
                        </ul>
                        {{-- <div class="tab-content card-block"> --}}

                           <div class="tab-content tabs-left-content card-block" style="width: 100%;">
                              
                              <div class="tab-pane @if($k == 1){{ 'active' }}@endif" id="category2"  role="tabpanel" style="height: 600px">
                                 
                                 <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                       <div class="card">
                                          <div class="card-block">
                                             {{-- <iframe src="https://signumsolutions.tech/dev/public/iframes?reportId={{ $report->report_id }}&amp;autoAuth=true&amp;pageName={{ $report->section_id }}&amp;filterPaneEnabled=false&amp;navContentPaneEnabled=false"
                                                id="report{{ $report->id }}"
                                                allowFullScreen
                                                width="100%"
                                                height="{{ $report->height }}"
                                                style="width:100%"
                                                frameborder="0"> ></iframe> --}}
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
                              </div>
                        {{-- </div> --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@section('page_js_resource')
<script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/powerbi-client/dist/powerbi.js"></script>
<script>
    window.onload = function () {
      reportTabLoader(2);

      $(".tublue").on('click',function(){

          var tabElem = $(this).attr('href');
          $(tabElem).find(".nav-link.active:first").trigger("click");
      })

   }
   function reportTabLoader(category_id)
   {
      var token = localStorage.getItem(category_id);
      console.log(token)
      if(token !==null)
      {
         console.log("token")
        embedNewReport(category_id);
        return;

      }
       $.ajax({
           url: '<?php echo e(env("APP_URL")); ?>getkpiCategoryData',
           type: 'GET',
           headers: {
               'Access-Control-Allow-Origin': '*'
           },
           data: {
               category_id: category_id
           },
           dataType: 'JSON',
           success: function (response) {
              console.log(response)
               loadThem(category_id,response);
               // $('#category'+category_id).html(response);
           },
           error: function () {
               swal({
                   title: 'Error!',
                   text: 'An error occurred while getting data of a tab',
                   type: 'error',
                   confirmButtonText: 'Okay'
               })
           }
       });
   }

   function loadThem(category_id,response)
   {
     localStorage.setItem(category_id,JSON.stringify(response));
     embedNewReport(category_id);

   }
   function embedNewReport(category_id)
   {
     var storedVals = JSON.parse(localStorage.getItem(category_id));
     console.log(storedVals.reportId)

     // start 
     var reportId = storedVals.reportId;
            var groupId = storedVals.groupId;
            var embedToken = storedVals.token;
            var sectionId = storedVals.sectionId;

            var txtAccessToken = storedVals.token;

            var txtEmbedUrl = 'https://app.powerbi.com/reportEmbed?reportId=' + reportId + '&groupId=' + groupId + '';

            //console.log('embed url'+txtEmbedUrl);

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
            if(sectionId !='');
            {
              config.pageName = sectionId;
            }

            var embedContainer = $('#category'+category_id)[0];

            
            var report = powerbi.embed(embedContainer, config);

            report.on("error", function (event) {
		if(event.type=='error' && event.detail.message =="TokenExpired")
              {
		$("#category"+category_id).html('');
                  localStorage.clear();
                  window.location.reload();
              }	
            });

//            console.log('loading ends');
     //end 
   }

</script>
@stop


<script>
   // function reportTabLoader(category_id)
   // {
   //     $.ajax({
   //         url: '<?php echo e(env("APP_URL")); ?>getkpicategoryiframes',
   //         type: 'GET',
   //         headers: {
   //             'Access-Control-Allow-Origin': '*'
   //         },
   //         data: {
   //             category_id: category_id
   //         },
   //         dataType: 'JSON',
   //         success: function (response) {
   //             $('#category'+category_id).html(response);
   //         },
   //         error: function () {
   //             swal({
   //                 title: 'Error!',
   //                 text: 'An error occurred while getting data of a tab',
   //                 type: 'error',
   //                 confirmButtonText: 'Okay'
   //             })
   //         }
   //     });
   // }
</script>
@stop

