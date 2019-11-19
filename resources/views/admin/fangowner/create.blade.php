
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
                        <h4 class="page-title">房东信息添加</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">房东信息添加</li>
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
                            <h4 class="card-title">房东信息添加</h4>
                            <form class="needs-validation" novalidate action="{{route("admin.fangowner.store")}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom01">房东姓名</label>
                                        <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="请输入您的房东姓名" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">房东年龄</label>
                                        <input type="text" name="age" class="form-control" id="validationCustom02" placeholder="请输入房东年龄" value="" required>
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
                                            <input type="text" name="email" class="form-control" id="validationCustomUsername" placeholder="请输入邮箱" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose email.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom03">性别</label>
                                        <div >
                                            <input style="width: 20px;" type="checkbox" checked name="sex"  class="form-control" id="validationCustom03" value="男">
                                            <label>男</label>
                                            <input style="width: 20px;" type="checkbox" name="sex"  class="form-control" id="validationCustom03" value="女">
                                            <label>女</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please provide 性别.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom03">手机号</label>
                                        <input type="text" name="phone" class="form-control" id="validationCustom03" placeholder="请输入手机号" required>
                                        <div class="invalid-feedback">
                                            Please provide 手机号.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom04">身份证号码</label>
                                        <input type="text" name="card" class="form-control" id="validationCustom04" placeholder="请输入身份证号码" required>
                                        <div class="invalid-feedback">
                                            Please provide 身份证号码.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom05">联系地址</label>
                                        <input type="text" name="address" class="form-control" id="validationCustom05" placeholder="请输入联系地址" required>
                                        <div class="invalid-feedback">
                                            Please provide 联系地址.
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
