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
                           @if(isset($data['categories']) && !empty($data['categories']))
                           @php
                           $l = 1;
                           @endphp
                           @foreach($data['categories'] as $catageory)
                           <li class="nav-item">
                              <a class="tublue nav-link @if($l == 1){{ 'active' }}@endif" data-toggle="tab" href="#tab{{ $catageory->category_id }}" role="tab"
                                 aria-selected="false">{{ $catageory->name }}</a>
                              <div class="slide"></div>
                           </li>
                           @php
                           $l++;
                           @endphp
                           @endforeach
                           @endif
                        </ul>
                        <div class="tab-content card-block">
                           @if(isset($data['categories']) && !empty($data['categories']))
                           @php
                           $l = 1;
                           @endphp
                           @foreach($data['categories'] as $category)
                           <div class="tab-pane @if($l == 1){{ 'active' }}@endif" id="tab{{ $category->category_id }}" role="tabpanel">
                              <div class="row">
                                 <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card-block accordion-block color-accordion-block">
                                       <div class="color-accordion" id="color-accordion{{ $l }}">
                                          @php
                                          // if(isset($tab->category_id) && !empty($tab->category_id)) {
                                          // $admin_helper = new \App\Models\AdminHelper();
                                          // $categories = $admin_helper->getTabCategories($tab->category_id);
                                          // }
                                          @endphp
                                          @if(isset($data['subcategories'][$category->category_id]) && !empty($data['subcategories'][$category->category_id]))
                                          @php
                                          $i = 1;
                                          @endphp
                                          
                                          {{-- <a class="sublue accordion-msg b-none waves-effect waves-light" data-trend="sublue{{$category->category_id}}">{{ $category->name }}</a> --}}
                                          <div class="">
                                             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 category__tabs sublue{{$category->category_id}}" >
                                                <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist" style="background: #263544;border-radius: 15px;">
                                                   @php
                                                   // if(isset($category->category_id) && !empty($category->category_id)) {
                                                   // $admin_helper = new \App\Models\AdminHelper();
                                                   // $subcategories = $admin_helper->getCategorySubCategories($category->category_id);
                                                   // }
                                                   $subcategories = $data['subcategories'][$category->category_id]
                                                   @endphp
                                                   @if(isset($subcategories) && !empty($subcategories))
                                                   @php
                                                   $k = 1;
                                                   @endphp
                                                   @foreach($subcategories as $subcategory)
                                                   @if($k == 1) 
                                                   <li class="nav-item">
                                                      <i class="fa fa-arrow-left" style="color: white;margin: 15px;"></i>
                                                   </li>
                                                   <li class="nav-item">
                                                      <i class="fa fa-arrow-right" style="color: white;margin: 15px;"></i>
                                                   </li>
                                                   @endif
                                                   <li class="nav-item">
                                                      <a class="nav-link @if($k == 1) {{ 'active' }} @endif" data-toggle="tab"
                                                         href="#category{{ $subcategory->category_id }}" role="tab" 
                                                         onclick="reportTabLoader({{ $subcategory->category_id }})"> <i class="feather icon-list" aria-hidden="true"></i> 
                                                      <span>   {{ $subcategory->name }}</span>
                                                      </a>
                                                      <div class="slide"></div>
                                                   </li>
                                                   @php
                                                   $k++;
                                                   @endphp
                                                   @endforeach
                                                   @endif
                                                </ul>
                                                <div class="tab-content tabs-left-content card-block" style="width: 100%;">
                                                   @if(isset($subcategories) && !empty($subcategories))
                                                   @php
                                                   $k = 1;
                                                   @endphp
                                                   @foreach($subcategories as $subcategory)
                                                   @php
                                                   $user_helper = new \App\Models\UserHelper();
                                                   $reports = $user_helper->getCategoryReports($subcategory->category_id);
                                                   @endphp
                                                   <div class="tab-pane @if($k == 1){{ 'active' }}@endif" id="category{{ $subcategory->category_id }}" role="tabpanel" style="height: 600px">
                                                      @if($k == 1)
                                                      <div class="row">
                                                         @if(isset($reports) && !empty($reports))
                                                         @foreach($reports as $report)
                                                         <div class="col-sm-12 col-md-12 col-lg-12"> 
                                                            <div class="card">
                                                               <div class="card-block" >
                                                               </div>
                                                            </div>
                                                         </div>
                                                         @endforeach
                                                         @endif
                                                      </div>
                                                      @endif
                                                   </div>
                                                   @php
                                                   $k++;
                                                   @endphp
                                                   @endforeach
                                                   @endif
                                                </div>
                                             </div>
                                          </div>
                                          @php
                                          $i++;
                                          @endphp
                                          
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @php
                           $l++;
                           @endphp
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop
@section('page_js_resource')
<script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/powerbi-client/dist/powerbi.js"></script>
<script>
    window.onload = function () {
      reportTabLoader(<?php echo $data['first_report']; ?>);

      $(".tublue").on('click',function(){

          var tabElem = $(this).attr('href');
          $(tabElem).find(".nav-link.active:first").trigger("click");
      })

      // $(".sublue").on('click',function(){
      //     console.log('so wee are ');
      //     var elemRef = $(this).data('trend');
      //     console.log($("."+elemRef).find(".nav-link.active:first").attr("onclick"));
          
      //     $("."+elemRef).find(".nav-link.active:first").trigger("onclick");
      //     //$(this).closest('.category__tabs').find(".nav-link.active:first").trigger("click");
      // })
   }
   function reportTabLoader(category_id)
   {
      var token = localStorage.getItem(category_id);
      if(token !==null)
      {
        embedNewReport(category_id);
        return;

      }	
       $.ajax({
           url: 'https://www.signumsolutions.tech/lmad/public/getcategorydata',
           type: 'GET',
           headers: {
               'Access-Control-Allow-Origin': '*'
           },
           data: {
               category_id: category_id
           },
           dataType: 'JSON',
           success: function (response) {
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
   $(".fa-arrow-right").hide();
$(".fa-arrow-left").click(function() {
   $('.tabs-left li').width(60);	
   $('.md-tabs .nav-item span').hide();
   $(".fa-arrow-left").hide();
   $(".fa-arrow-right").show();
});

$(".fa-arrow-right").click(function(){
   $('.tabs-left li').width(150);	
   $('.md-tabs .nav-item span').show();
   $(".fa-arrow-left").show();
   $(".fa-arrow-right").hide();
})

</script>
@stop

