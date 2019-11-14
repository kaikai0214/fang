
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
                        <h4 class="page-title">权限添加</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">权限添加</li>
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
                            <h4 class="card-title">权限添加</h4>
                            <form class="needs-validation" novalidate action="{{route("admin.node.store")}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <span class="badge badge-info"><i class="fas fa-info"></i></span>
                                        <strong>顶级权限默认不选，下级权限请先选择上级权限</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <label class="control-label col-form-label">上级权限</label>
                                        <div class="form-group">
                                            <select name="pid" class="form-control">
                                                @foreach($nodes as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">权限名称</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" name="name" class="form-control" id="validationCustomUsername" placeholder="请输入权限名称" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose 权限.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">路由名称</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" name="route_name" class="form-control" id="validationCustomUsername" placeholder="请输入路由名称" aria-describedby="inputGroupPrepend">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label col-form-label">是否为菜单</label>
                                            <div class="form-check">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" value="1" class="custom-control-input" id="customControlValidation2" name="is_menu">
                                                    <label class="custom-control-label" for="customControlValidation2">是</label>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" value="0" class="custom-control-input" id="customControlValidation3" name="is_menu">
                                                    <label class="custom-control-label" for="customControlValidation3">否</label>
                                                </div>
                                            </div>
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
