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
                            <h5>Client Edit</h5>
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
                            <div class="col-lg-6 col-xl-6">
                                
                                <form class="md-float-material form-material" method="POST" action="{{ url('/admin/updateclient') }}">
                {{ csrf_field() }}

               
                <div class="auth-box card">
                    <div class="card-block">
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                
                                 <?php if (isset($meserror)) {?>
                                
                                        <h6 style="color: red;">{{$meserror}}</h6>

                                 <?php }?>
                            </div>
                        </div>
                        
                          <div class="form-group form-primary">
                            <label>Name : {{$data['tab_data']->first_name}}</label>
                          </div>

                          <div class="form-group form-primary">
                            <label>Email : {{$data['tab_data']->email}}</label>
                          </div>

                          <div class="form-group form-primary">
                            <label>Phone : {{$data['tab_data']->phone}}</label>
                          </div>

                          <div class="form-group form-primary">
                            <label>Username : {{$data['tab_data']->username}}</label>
                          </div>

                        <input type="hidden" name="userid" value="{{$data['tab_data']->user_id}}">

                        <div class="form-group form-primary">

                             <span class="form-bar"></span>
                            <label style="color: blue">Power Bi Username</label>
                            <input type="text" name="biname" class="form-control" required="">
                           
                        </div>
                       
                        <div class="form-group form-primary">
                             <label style="color: blue">Power Bi password</label>
                            <input type="password" name="bipassword" class="form-control" required="">
                            
                        </div>

                        <div class="form-group">
                             <label style="color: blue">Status</label>
                          <span>  <input type="radio" name="status" value="1" class="=" required="">Enable</span>
                          <span>
                            <input type="radio" name="status" value="0" class="" required="">Diable</span>
                            
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


