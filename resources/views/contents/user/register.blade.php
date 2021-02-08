@extends('layouts.login')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            
            <form class="md-float-material form-material" method="POST" action="{{ url('/userregister') }}">
                {{ csrf_field() }}

                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="Theme-Logo" />
                </div>
                <div class="auth-box card">
                    <div class="card-block">
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-center txt-primary">Sign Up</h3>
                                 <?php if (isset($meserror)) {?>
                                
                                        <h6 style="color: red;">{{$meserror}}</h6>

                                 <?php }?>
                            </div>
                        </div>
                        <div class="form-group form-primary">
                            <input type="text" name="first-name" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">First Name</label>
                        </div>
                        <div class="form-group form-primary">
                            <input type="text" name="name" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Username</label>
                        </div>
                        <div class="form-group form-primary">
                            <input type="email" name="email" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Email</label>
                        </div>
                        <div class="form-group form-primary">
                            <input type="phone" name="phone" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Phone</label>
                        </div>
                        <div class="form-group form-primary">
                            <input type="password" name="password" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Password</label>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end of form -->
        </div>
        <!-- Authentication card end -->
    </div>
    <!-- end of col-sm-12 -->
@stop


@section('page_js_resources')

@stop

