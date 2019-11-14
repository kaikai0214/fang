
@extends("admin.public.main")
@section("content")
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">用户修改</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">用户修改</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">用户修改</h4>
                        <form class="needs-validation" novalidate action="{{route("admin.user.update",['id'=>$data->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">账号</label>
                                    <input type="text" name="username" value="{{$data->username}}" class="form-control" id="validationCustom01" placeholder="请输入您的账号" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">实名</label>
                                    <input type="text" name="truename" value="{{$data->truename}}" class="form-control" id="validationCustom02" placeholder="请输入真实实名" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        </div>
                                        <input type="text" name="email" value="{{$data->email}}" class="form-control" id="validationCustomUsername" placeholder="请输入邮箱" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose email.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">手机号</label>
                                    <input type="text" name="phone" value="{{$data->phone}}" class="form-control" id="validationCustom03" placeholder="请输入手机号" required>
                                    <div class="invalid-feedback">
                                        Please provide 手机号.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">密码</label>
                                    <input type="text" name="password" value="" class="form-control" id="validationCustom04" placeholder="请输入密码" required>
                                    <div class="invalid-feedback">
                                        Please provide 密码.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">确认密码</label>
                                    <input type="text" name="password_confirmation" class="form-control" id="validationCustom05" placeholder="请再次输入密码" required>
                                    <div class="invalid-feedback">
                                        Please provide 二次密码.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="invalidCheck" value="check" required>
                                    <label class="custom-control-label" for="invalidCheck">我已同意协议</label>
                                </div>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>

                        @include("admin.public.msg")
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function(form) {
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script>
                    </div>
                </div>
            </div>
            {{--<div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Supported elements</h4>
                        <form class="was-validated">
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                <label class="custom-control-label" for="customControlValidation1">Check this custom checkbox</label>
                                <div class="invalid-feedback">Example invalid feedback text</div>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                                <label class="custom-control-label" for="customControlValidation2">Toggle this custom radio</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
                                <label class="custom-control-label" for="customControlValidation3">Or toggle this other custom radio</label>
                                <div class="invalid-feedback">More example invalid feedback text</div>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" required>
                                    <option value="">Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <div class="invalid-feedback">Example invalid custom select feedback</div>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>--}}
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Nice admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
@endsection
@section("js")
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
