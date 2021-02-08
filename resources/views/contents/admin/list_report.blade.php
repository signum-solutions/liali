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
                            <h5>Reports</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 add_report_button_container">
                    <a type="button" href="{{ url('admin/addreport') }}" class="btn btn-primary">Add Report</a>
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
                                            <th>Category</th>
                                            <th>Parent Category</th>
                                            <th>Report Id</th>
                                            <th>Section Id</th>
                                            <th>Order</th>
                                            <th>Container Size</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($data['report_list'] ) && !empty($data['report_list']))
                                                @foreach($data['report_list'] as $report)
                                                    <tr>
                                                        <td>
                                                            @php
                                                                if(isset($report->sub_category_id)) {
                                                                    $admin_helper = new \App\Models\AdminHelper();
                                                                    $sub_category_name = $admin_helper->getCategoryName($report->sub_category_id);
                                                                    echo $sub_category_name;
                                                                }
                                                            @endphp
                                                        </td>
                                                        <td>
                                                            @php
                                                                if(isset($report->category_id)) {
                                                                    $admin_helper = new \App\Models\AdminHelper();
                                                                    $category_name = $admin_helper->getCategoryName($report->category_id);
                                                                    echo $category_name;
                                                                }
                                                            @endphp
                                                        </td>
                                                        <td>{{ $report->report_id }}</td>
                                                        <td>{{ $report->section_id }}</td>
                                                        <td>{{ $report->order_no }}</td>
                                                        <td>{{ $report->container_size }}</td>
                                                        <td>{{ $report->status }}</td>
                                                        <td>
                                                            <a href="{{ url('admin/updatereport/'.$report->id) }}" type="button" class="btn btn-primary"><i class="feather icon-edit"></i></a>
                                                            <a href="{{ url('admin/deletereport/'.$report->id) }}" type="button" class="btn btn-danger"><i class="feather icon-trash"></i></a>
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


