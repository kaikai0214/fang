
    @extends("admin.public.main")

    @section("css")
        <link rel="stylesheet" href="{{Adminstatic()}}/webuploader/webuploader.css">
    @endsection

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
                        <h4 class="page-title">房源属性添加</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">房源属性添加</li>
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
                            <h4 class="card-title">房源属性添加</h4>
                            <form class="needs-validation" id="fangAttr" novalidate action="{{route("admin.fangattr.store")}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <span class="badge badge-info"><i class="fas fa-info"></i></span>
                                        <strong>顶级属性默认不选，下级权限请先选择上级房源属性</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <label class="control-label col-form-label">上级房源属性</label>
                                        <div class="form-group">
                                            <select name="pid" id="pid" class="form-control">
                                                @foreach($fangData as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">房源属性名称</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" name="name" id="name" placeholder="请输入房源属性名称">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">字段名称</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" name="field_name" id="field_name" placeholder="请输入字段名称">
                                        </div>
                                    </div>

                                    <div id="uploader" class="wu-example">
                                        <!--用来存放文件信息-->
                                        <label class="form-label col-xs-12 col-sm-12">图标：</label>
                                        <div class="uploader-thum-container">
                                            <div id="filePicker">选择图片</div>
                                            <input type="hidden" name="icon" id="pic">
                                            <img src="" style="width: 100px;" id="showpic">
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="invalidCheck" value="check">
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
        <script src="{{Adminstatic()}}/webuploader/webuploader.js"></script>
        {{--引入jquery验证类--}}
        <script type="text/javascript" src="{{ Adminstatic() }}jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="{{ Adminstatic() }}jquery/messages_zh.js"></script>
        <script type="text/javascript" src="{{ Adminstatic() }}jquery/jquery.validate.js"></script>
        <script>
            // 表单验证
            $("#fangAttr").validate({
                // 规则
                rules: {
                    // 表单名
                    name: {
                        // 规则名 true/false
                        required: true
                    },
                    field_name: {
                        // 验证规则就是自定义名称
                        fieldName: true
                    }
                },
                // 回车取消
                onkeyup: false,
                // 成功时样式
                success: "valid",
                // 验证通过后，处理回调函数
                submitHandler: function (form) {
                    // 验证通过，使用js触发表单提交事件
                    form.submit();
                }
            });

            // 自定义jquery-validate验证器
            jQuery.validator.addMethod("fieldName", function (value, element) {
                // 获取房源属性下拉列表中的元素的值
                let bool = $('#pid').val() == 0 ? false : true;
                // 正则 \w 0-9a-zA-Z_
                let reg = /[a-zA-Z_]+/;
                return bool || (reg.test(value));
            }, "选择顶级属性请一定要填写对应的字段名称");

        </script>
        <script>
            let uploader = WebUploader.create({
                //自动上传
                auto:true,
                // swf文件路径
                swf: '{{Adminstatic()}}/webuploader/Uploader.swf',

                // 文件接收服务端。
                server: '{{route('admin.base.upfile')}}',

                // 选择文件的按钮。可选。
                pick: '#filePicker',

                //表单提交
                forData:{_token:"{{csrf_token()}}",node:"fangattr"},

                fileVal:'file',

                // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                resize: false
            });
            uploader.on('uploadSuccess',function (file,{url}) {
                console.log(url);
                $("#pic").val(url);
                $("#showpic").attr("src",url);
            });
        </script>


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
