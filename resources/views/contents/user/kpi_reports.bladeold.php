

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
                           @endphp
                           @foreach($data['tab_list'] as $tab)
                           <li class="nav-item">
                              <a class="nav-link @if($l == 1){{ 'active' }}@endif" data-toggle="tab" href="#tab{{ $tab->category_id }}" role="tab"
                                 aria-selected="false">{{ $tab->name }}</a>
                              <div class="slide"></div>
                           </li>
                           @php
                           $l++;
                           @endphp
                           @endforeach
                           @endif
                        </ul>
                        <div class="tab-content card-block">
                           @if(isset($data['tab_list']) && !empty($data['tab_list']))
                           @php
                           $l = 1;
                           @endphp
                           @foreach($data['tab_list'] as $tab)
                           <div class="tab-pane @if($l == 1){{ 'active' }}@endif" id="tab{{ $tab->category_id }}" role="tabpanel">
                              <div class="row">
                                 <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card-block accordion-block color-accordion-block">
                                       <div class="color-accordion" id="color-accordion{{ $l }}">
                                          @php
                                          if(isset($tab->category_id) && !empty($tab->category_id)) {
                                          $admin_helper = new \App\Models\AdminHelper();
                                          $categories = $admin_helper->getKpiTabCategories($tab->category_id);
                                          }
                                          @endphp
                                          @if(isset($categories) && !empty($categories))
                                          @php
                                          $i = 1;
                                          @endphp
                                          @foreach($categories as $category)
                                          <a class="accordion-msg b-none waves-effect waves-light">{{ $category->name }}</a>
                                          <div class="accordion-desc">
                                             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 category__tabs">
                                                <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist" style="background: #263544;border-radius: 15px;">
                                                   @php
                                                   if(isset($category->category_id) && !empty($category->category_id)) {
                                                   $admin_helper = new \App\Models\AdminHelper();
                                                   $subcategories = $admin_helper->getKpiCategorySubCategories($category->category_id);
                                                   }
                                                   @endphp
                                                   @if(isset($subcategories) && !empty($subcategories))
                                                   @php
                                                   $k = 1;
                                                   @endphp
                                                   @foreach($subcategories as $category)
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
                                                         href="#category{{ $category->category_id }}" role="tab"
                                                         onclick="reportTabLoader({{ $category->category_id }})"> <i class="feather icon-list" aria-hidden="true"></i>
                                                      <span>   {{ $category->name }}</span>
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
                                                   @foreach($subcategories as $category)
                                                   @php
                                                   $user_helper = new \App\Models\UserHelper();
                                                   $reports = $user_helper->getKpiCategoryReports($category->category_id);
                                                   @endphp
                                                   <div class="tab-pane @if($k == 1){{ 'active' }}@endif" id="category{{ $category->category_id }}" role="tabpanel">
                                                      @if($k == 1)
                                                      <div class="row">
                                                         @if(isset($reports) && !empty($reports))
                                                         @foreach($reports as $report)
                                                         <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <div class="card">
                                                               <div class="card-block">
                                                                  <iframe src="https://signumsolutions.tech/dev/public/iframes?reportId={{ $report->report_id }}&amp;autoAuth=true&amp;pageName={{ $report->section_id }}&amp;filterPaneEnabled=false&amp;navContentPaneEnabled=false"
                                                                     id="report{{ $report->id }}"
                                                                     allowFullScreen
                                                                     width="100%"
                                                                     height="{{ $report->height }}"
                                                                     style="width:100%"
                                                                     frameborder="0"> ></iframe>
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
                                          @endforeach
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
<script>
   function reportTabLoader(category_id)
   {
       $.ajax({
           url: '<?php echo e(env("APP_URL")); ?>getkpicategoryiframes',
           type: 'GET',
           headers: {
               'Access-Control-Allow-Origin': '*'
           },
           data: {
               category_id: category_id
           },
           dataType: 'JSON',
           success: function (response) {
               $('#category'+category_id).html(response);
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
</script>
@stop

