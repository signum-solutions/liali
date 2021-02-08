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
                    <a type="button" href="{{ url('admin/addsubcategory') }}" class="btn btn-primary">Add Sub Category</a>
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
                                            <th>Parent Category</th>
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
                                                        <td>
                                                            @php
                                                                if(isset($category->parent_category_id) && $category->parent_category_id) {
                                                                    $admin_helper = new \App\Models\AdminHelper();
                                                                    $category_name = $admin_helper->getCategoryName($category->parent_category_id);
                                                                    echo $category_name;
                                                                }
                                                            @endphp
                                                        </td>
                                                        <td>{{ $category->order_by }}</td>
                                                        <td>
                                                            <a href="{{ url('admin/updatesubcategory/'.$category->category_id) }}" type="button" class="btn btn-primary"><i class="feather icon-edit"></i></a>
                                                            <a href="{{ url('admin/deletesubcategory/'.$category->category_id) }}" type="button" class="btn btn-danger"><i class="feather icon-trash"></i></a>
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


