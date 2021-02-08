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
                            <h5>Add KPI Sub Category</h5>
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
                                <a href="{{ url('admin/listkpisubcategory') }}">Sub Categories</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#!">Add Sub Category</a>
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
                                                <form method="POST" action="{{ url('admin/addkpisubcategory') }}" >
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
                                                        <label for="parent-category">Select Parent Category</label>
                                                        <select class="form-control" id="parent-category" required="required" name="parent_category">
                                                            <option value="" disabled selected>Select Parent Category</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name">Category Name</label>
                                                        <input type="text" class="form-control" id="name" required="required" name="name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="order">Order</label>
                                                        <input type="number" class="form-control" id="order" name="order">
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Add Category</button>
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
                        $('#parent-category').html(response);
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
        });
    </script>
@stop
