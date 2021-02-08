@extends('layouts.login')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form class="md-float-material form-material" method="POST" action="{{ url('admin/usercheckLogin') }}">
                {{ csrf_field() }}

                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="Theme-Logo" />
                </div>
                <div class="auth-box card">
                    <div class="card-block">
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-center txt-primary">Sign In</h3>
                            </div>
                        </div>
                        <div class="form-group form-primary">
                            <input type="text" name="user-name" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Username</label>
                        </div>
                        <div class="form-group form-primary">
                            <input type="password" name="password" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Password</label>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                            </div>
                        </div>
                        
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <a href="{{ url('/signup') }}" class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">Create New Account</a>
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

<script type="text/javascript">

    window.onload = function () {
        localStorage.clear();
    }
</script>
@stop


@section('page_js_resources')

@stop

