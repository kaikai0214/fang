
@extends("admin.public.main")

@section("css")
    <link rel="stylesheet" href="{{Adminstatic()}}/webuploader/webuploader.css">
    <style>
        .imgBox{
            width: 100px;
            height: 100px;
            border:1px solid red;
            margin-left: 100px;
            position: relative;
        }
        .imgBox div{
            position: absolute;
            right:5px;
            top:0px;
            color: red;
            font-size: 20px;
            cursor: pointer;
            font-weight: 900;
        }
    </style>
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
                        <h4 class="card-title">文章修改</h4>
                        <form class="needs-validation" novalidate action="{{route("admin.article.update",$article)}}"
                              method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">文章名称</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        </div>
                                        <input type="text" name="title" class="form-control"
                                               id="validationCustomUsername" value="{{$article->title}}"
                                               aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose email.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- 选择给用户添加权限 --}}
                            <div class="card">
                                <h4 class="card-title">选择文章分类</h4>
                                <select name="cid" id="">
                                    @foreach($cateData as $v)
                                        <option value="{{$v['id']}}" @if($v['id'] == $article->cid) selected @endif>
                                            {{$v['html']}}{{$v['cname']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>文章概要</label>
                                <textarea class="form-control" rows="5"
                                          value="{{$article->desn}}" name="desn">{{$article->desn}}</textarea>
                            </div>

                            <textarea id="editor" rows="5" name="body">{{$article->body}}</textarea>

                            {{--                                选择图片文件--}}
                            {{--                            <div class="form-group row align-items-center m-b-0">--}}
                            {{--                                <label for="inputEmail3" class="col-1 control-label col-form-label"  style="text-align: center;">Select File</label>--}}
                            {{--                                <div class="col-11 border-left p-b-10 p-t-10">--}}
                            {{--                                    <div class="input-group">--}}
                            {{--                                        <div class="input-group-prepend">--}}
                            {{--                                            <span class="input-group-text">Upload</span>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="custom-file">--}}
                            {{--                                            <input type="file" class="custom-file-input" id="inputGroupFile01">--}}
                            {{--                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div id="uploader" class="wu-example">
                                <!--用来存放文件信息-->
                                <label class="form-label col-xs-4 col-sm-2">封面图：</label>
                                <div class="uploader-thum-container">
                                    <div id="filePicker">选择图片</div>
                                    <input type="hidden" name="pic" id="pic" value="{{$article->pic}}">
                                    <div class="imgBox">
                                        <img src="{{$article->pic}}" style="width: 100px;" id="showpic">
                                        <div class="delimg" onclick="delImg('{{$article->id}}','{{$article->pic}}')">x</div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="invalidCheck"
                                               value="check" required>
                                        <label class="custom-control-label" for="invalidCheck">我已同意协议</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
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
    // console.log(1);
    <script>
        function delImg(id,src){
            $.get('{{route('admin.article.delfile')}}',{id,src}).then(res=>{
                console.log(res);
                $('.imgBox').slideUp('slow');
            });
        }

        let ue = UE.getEditor('editor',{
            initialFrameHeight:500,
            initialFrameWidth:1553
        });
        let uploader = WebUploader.create({
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
