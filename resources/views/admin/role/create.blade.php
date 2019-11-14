
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
                        <h4 class="page-title">角色添加</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">角色添加</li>
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
                            <h4 class="card-title">角色添加</h4>
                            <form class="needs-validation" novalidate action="{{route("admin.role.store")}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustomUsername">角色名称</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" name="name" class="form-control" id="validationCustomUsername" placeholder="请输入角色名称" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose email.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- 选择给用户添加权限 --}}
                                    <div class="card">
                                            <h4 class="card-title">添加用户权限</h4>
                                        @foreach($nodes_list as $v)
                                            <div class="custom-control custom-checkbox" style="margin-left: {{$v['level']*30}}px;">
                                                <input type="checkbox" class="check_node" iid="{{$v['id']}}" pid="{{$v['pid']}}" value="{{$v['id']}}" name="node_ids[]" >
                                                <label for="customCheck1">{{$v['html']}}{{$v['name']}}</label>
                                            </div>
                                        @endforeach
                                        <script>
                                            $(".check_node").click(function () {
                                                let status = $(this).is(":checked");
                                                let pid = $(this).attr('pid');
                                                //先根据pid判断点击的是子选项
                                                if(pid>0){
                                                     // ===pid
                                                    let status_arr = [];
                                                    //通过循环获取所有跟子选项相同多选框的选中状态并存入数组   ['false','true'];
                                                    $("input[name='node_ids[]']").map(function(i){
                                                        if($(this).attr('pid')==pid){
                                                            status_arr[i]=$(this).is(":checked");
                                                        }
                                                        //循环的过程中发现所有的多选框中有iid是pid的，就把它勾中（就是选中父选项）
                                                        if($(this).attr('iid')==pid){
                                                            $(this).prop("checked",true)
                                                        }
                                                    })
                                                    //判断状态数组中是否有true,没有就把当前选中的父选项选中状态去掉
                                                    if(status_arr.indexOf(true)==-1){
                                                        $("input[name='node_ids[]']").map(function(i){
                                                            if($(this).attr('iid')==pid){
                                                                $(this).prop("checked",false)
                                                            }
                                                        })
                                                    }
                                                }
                                                //点击的是父选项，就把所有子选中勾中或者取消
                                                else{
                                                    let c_pid = $(this).val();
                                                    if(status==true){
                                                        $("input[name='node_ids[]']").map(function(){
                                                            if($(this).attr('pid')==c_pid){
                                                                $(this).prop("checked",true)
                                                            }
                                                        })
                                                    }else{
                                                        $("input[name='node_ids[]']").map(function(){
                                                            if($(this).attr('pid')==c_pid){
                                                                $(this).prop("checked",false)
                                                            }
                                                        })
                                                    }
                                                }
                                            })
                                        </script>
{{--                                            <div class="custom-control custom-checkbox">--}}
{{--                                                <input type="checkbox" class="custom-control-input" id="customCheck2" checked>--}}
{{--                                                <label class="custom-control-label" for="customCheck2">I am checked Checkbox</label>--}}
{{--                                            </div>--}}
                                    </div>
                                <hr>
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
