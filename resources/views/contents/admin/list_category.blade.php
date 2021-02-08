@extends('layouts.default')
@section('content')

    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-layers bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Categories</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 add_report_button_container">
                    <a type="button" href="{{ url('admin/addcategory') }}" class="btn btn-primary">Add Category</a>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="card container-fluid">
                                    <table class="table table-bordered" style="margin-top: 20px;">
                                        <thead>
                                        <tr>
                                            <th>Category Id</th>
                                            <th>Name</th>
                                            <th>Order</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($data['category_list']) && !empty($data['category_list']))
                                            @foreach($data['category_list'] as $category)
                                                <tr>
                                                    <td>{{ $category->category_id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->order_by }}</td>
                                                    <td>
                                                        <a type="button" href="{{ url('admin/updatecategory/'. $category->category_id) }}" class="btn btn-primary"><i class="feather icon-edit"></i></a>
                                                        <a type="button" href="{{ url('admin/deletecategory/'. $category->category_id) }}" class="btn btn-danger"><i class="feather icon-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


