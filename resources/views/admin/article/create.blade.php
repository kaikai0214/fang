
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
                        <h4 class="page-title">文章添加</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">文章添加</li>
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
                            <h4 class="card-title">文章添加</h4>
                            <form class="needs-validation" novalidate action="{{route("admin.article.store")}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustomUsername">文章名称</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" name="name" class="form-control" id="validationCustomUsername" placeholder="请输入文章名称" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose email.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- 选择给用户添加权限 --}}
                                    <div class="card">
                                            <h4 class="card-title">选择文章分类</h4>
                                        @foreach($cateData as $v)
                                            <div class="custom-control custom-checkbox" style="margin-left: {{$v['level']*30}}px;">
                                                <input type="checkbox" class="check_node" iid="{{$v['id']}}" pid="{{$v['pid']}}" value="{{$v['id']}}" name="node_ids[]" >
                                                <label for="customCheck1">{{$v['html']}}{{$v['cname']}}</label>
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
                                    </div>

                                <div class="form-group">
                                    <label>文章概要</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>

                                <textarea id="editor" rows="5"></textarea>

{{--                                选择图片文件--}}
                                <div class="form-group row align-items-center m-b-0">
                                    <label for="inputEmail3" class="col-1 control-label col-form-label"  style="text-align: center;">Select File</label>
                                    <div class="col-11 border-left p-b-10 p-t-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="uploader" class="wu-example">
                                    <!--用来存放文件信息-->
                                    <label class="form-label col-xs-4 col-sm-2">封面图：</label>
                                    <div class="uploader-thum-container">

                                        <input type="hidden" name="pic" id="pic">
                                        <img src="" style="width: 100px;" id="showpic">
                                    </div>
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


                                <div id="filePicker">选择图片</div>

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
        <script src="{{Adminstatic()}}js/ueditor.config.js"></script>
        <script src="{{Adminstatic()}}js/ueditor.all.js"></script>
        <script src="{{Adminstatic()}}js/zh-cn.js"></script>
        <script src="{{Adminstatic()}}/webuploader/webuploader.js"></script>
        <script>
            var ue = UE.getEditor('editor',{
                initialFrameHeight:500,
                initialFrameWidth:1553
            });
            var uploader = WebUploader.create({
                auto:true,
                // swf文件路径
                swf: '{{Adminstatic()}}/webuploader/Uploader.swf',

                // 文件接收服务端。
                server: '{{route('admin.article.upfile')}}',

                // 选择文件的按钮。可选。
                pick: '#filePicker',

                //表单提交
                forData:{_token:"{{csrf_token()}}"},

                fileVal:'file',

                // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                resize: false
            });
            uploader.on('uploadSuccess',function (file,{url}) {
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
