@extends('layouts.default')
@section('content')

    <!-- [ navigation menu ] end -->
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-layers bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Add KPI Report</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="#!"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/listkpireport') }}">Reports</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#!">Add Report</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row m-b-20">
                                            <div class="col-sm-12 col-lg-12">
                                                <form method="POST" action="{{ url('/admin/addkpireport') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group">
                                                        <label for="tab">Select Tab</label>
                                                        <select class="form-control" id="tab" required="required" name="tab">
                                                            <option value="">Select Tab</option>
                                                            @if(isset($data['tab_list']) && !empty($data['tab_list']))
                                                                @foreach($data['tab_list'] as $tab)
                                                                    <option value="{{ $tab->category_id }}">{{ $tab->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="category">Select Category</label>
                                                        <select class="form-control" id="category" required="required" name="category">
                                                            <option value="" selected disabled>Select Parent Category</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="sub-category">Select Sub Category</label>
                                                        <select class="form-control" id="sub-category" required="required" name="sub_category">
                                                            <option value="" disabled selected>Select Sub Category</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="report_id">Report Id</label>
                                                        <input type="text" class="form-control" id="report_id" required="required" name="report_id">
                                                        <small id="emailHelp" class="form-text text-muted">Example:- f1296613-2328-4a1f-b189-ca1874bc64b9</small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="section_id">Section Id</label>
                                                        <input type="text" class="form-control" id="section_id" name="section_id">
                                                        <small id="emailHelp" class="form-text text-muted">Example:- ReportSection6382fd0dad50fc9f0775</small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="order">Order</label>
                                                        <input type="number" class="form-control" id="order" name="order">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="container-size">Container Size</label>
                                                        <select class="form-control" id="container-size" required="required" name="container_size">
                                                            <option value="">Select Container Size</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="report_height">Report Height</label>
                                                        <input type="number" class="form-control" name="report_height" id="report_height">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" id="status" required="required" name="status">
                                                            <option value="enable">Enable</option>
                                                            <option value="disable">Disable</option>
                                                        </select>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Add Report</button>
                                                </form>
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
@stop

@section('page_js_resource')
    <script>
        $(function() {

            $('#tab').on('change', function() {
                var tab = $(this).val();

                $.ajax({
                    url: '{{ env("APP_URL") }}admin/getkpitabcategories',
                    type: 'GET',
                    headers: {
                        'Access-Control-Allow-Origin': '*'
                    },
                    data: {
                        tab_id: tab
                    },
                    success: function (response) {
                        $('#category').html(response);
                    },
                    error: function () {
                        swal({
                            title: 'Error!',
                            text: 'An error occurred while getting categories of a tab',
                            type: 'error',
                            confirmButtonText: 'Okay'
                        })
                    }
                });
            });

            $('#category').on('change', function() {
                var category = $(this).val();

                $.ajax({
                    url: '{{ env("APP_URL") }}admin/getkpicategorysubcategories',
                    type: 'GET',
                    headers: {
                        'Access-Control-Allow-Origin': '*'
                    },
                    data: {
                        category_id: category
                    },
                    success: function (response) {
                        $('#sub-category').html(response);
                    },
                    error: function () {
                        swal({
                            title: 'Error!',
                            text: 'An error occurred while getting sub categories of a category',
                            type: 'error',
                            confirmButtonText: 'Okay'
                        })
                    }
                });
            });

        });
    </script>
@stop
