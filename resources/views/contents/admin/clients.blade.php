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
                            <h5>Client List</h5>
                        </div>
                    </div>
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
                                                <th>Name</th>
                                                <th>UserName</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($data['tab_list'] ) && !empty($data['tab_list']))
                                                @foreach($data['tab_list'] as $tab)
                                                    <tr>
                                                        <td>{{ $tab->first_name }}</td>
                                                        <td>{{ $tab->username }}</td>
                                                        <td>{{ $tab->email }}</td>
                                                        <td>{{ $tab->phone }}</td>
                                                        <td>{{ $tab->status }}</td>
                                                        
                                                        <td>
                                                            <a type="button" href="{{ url('/admin/useredit/'. $tab->user_id) }}" class="btn btn-primary"><i class="feather icon-edit"></i></a>
                                                            <a type="button" href="{{ url('/admin/useredit/'. $tab->user_id) }}" class="btn btn-danger"><i class="feather icon-trash"></i></a>
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


