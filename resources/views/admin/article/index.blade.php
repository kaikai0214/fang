    @extends("admin.public.main")
    @section('css')
        <link rel="stylesheet" href="{{Adminstatic()}}jquery/jquery.dataTables.css">
    @endsection
    @section('content')

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
                    <h4 class="page-title">角色列表</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">角色列表</li>
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

            <div class="text-c"> 日期范围：
                <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
                -
                <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
                <input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
                <button type="submit" class="btn btn-success" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
            </div>

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- basic table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">角色列表</h4>
                            @if(session()->has('success'))
                                <div style="font-size: 18px;color: red;">
                                    {{session('success')}}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="file_export" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input allcheck" id="customControlValidation1" required>
                                                <label class="custom-control-label" for="customControlValidation1"></label>
                                                <span class="label label-danger checkdelete" style="cursor: pointer;">批量删除</span>
                                            </div>
                                        </th>
                                        <th>Setting</th>
                                        <th>ID</th>
                                        <th>文章分类</th>
                                        <th>标题</th>
                                        <th>描述</th>
                                        <th>加入时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        {{-- 用不到分页处理--}}
                        </div>
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
    <script src="{{Adminstatic()}}jquery/jquery.dataTables.min.js"></script>
    <script>
        $('#file_export').dataTable({
            "order": [[ 0, "desc" ]],
            columnDefs:[{targets:[0,1],orderable:false} ],
        //    开启服务端分页
            serverSide:true,
            ajax:{
                url:'{{route("admin.article.index")}}',
                type:'GET',
                //如果不是GET请求，发送csrf验证
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
            },
            columns:[
                {data:'aaa',"defaultContent": "<div class=\"custom-control custom-checkbox\">\n" +
                        "                                                    <input type=\"checkbox\" value="+{data:'id'}+" name=\"ids[]\" id=\"customControlValidation2\" required>\n" +
                        "                                                </div>"},
                {data:'actionBth'},
                {data:'id'},
                {data:'cate.cname'},
                {data:'title'},
                {data:'desn'},
                {data:'created_at'},
            ]

        });
    </script>
    <script>

        let _token = '{{ csrf_token() }}';
        $('#file_export').on('click',".deluser",function () {
            let url = $(this).attr("href");
            console.log(11111);
            return false;
            // if(confirm("确定要删除吗？")){
            //     $.ajax({
            //         url,
            //         type:"delete",
            //         data:{ _token}
            //     }).then(res=>{
            //         $(this).parents("tr").remove();
            //         swal({
            //             title: "Success!",
            //             text: res.msg,
            //             type: "success",
            //             confirmButtonText: "Cool"
            //         });
            //     })
            //     // fetch(url,{
            //     //     method:'delete',
            //     //     headers :{
            //     //         'X-CSRF-TOKEN':_token,
            //     //         'content_type':'application/json'
            //     //     },
            //     //     body:json.stringify({age:22})
            //     // }).then(res=>{
            //     //     return res.json();
            //     // }).then(ret=>{
            //     //     $(this).parents("tr").remove();
            //     //     swal({
            //     //         title: "Success!",
            //     //         text: ret.msg,
            //     //         type: "success",
            //     //         confirmButtonText: "Cool"
            //     //     });
            //     // });
            // }

        });

        #全选js
        $(".allcheck").click(function () {
            $("input[name='ids[]']").prop("checked",$(this).prop("checked"));
        })
        $(".checkdelete").click(function () {
            let inputs = $("input[name='ids[]']:checked");
            let ids = [];
            inputs.map((key,value)=>{
                ids.push($(value).val());
            })
            $.ajax({
                url:"{{route("admin.user.destory")}}",
                data:{_token,ids},
                type:"delete"
            }).then(res=>{
                if(res.code == 200){
                    inputs.map((key,value)=>{
                        console.log(1);
                        console.log($(value).parent('tr'));
                        $(value).parent('tr').remove();
                    })
                    swal({
                        title: "Success!",
                        text: res.msg,
                        type: "success",
                        confirmButtonText: "Cool"
                    }).then(function () {
                        console.log(1);
                        window.location.reload();
                    });
                }else{
                    swal({
                        title: "Errors!",
                        text: res.msg,
                        type: "error",
                        confirmButtonText: "Cool"
                    });
                }

            })
        })

        function change(status,id,current) {
            if(status==1){
                //    1说明是激活的状态，更改它的操作就是软删除，
                $.ajax({
                    url:'{{route("admin.user.destory")}}',
                    type:"delete",
                    data:{ _token,ids:[id]}
                }).then(res=>{
                    if(res.code==200) {
                        $(current).removeClass('btn btn-info btn-circle btn-lg').addClass('btn btn-secondary btn-circle btn-lg');
                        swal({
                            title: "Success!",
                            text: "用户状态更改成功",
                            type: "success",
                            confirmButtonText: "Cool"
                        });
                        window.location.reload();
                    }else{
                        swal({
                            title: "error!",
                            text: res.msg,
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                    }

                })
            }
            else{
                //    0说明是未激活的状态，更改它的操作就是恢复状态，
                $.ajax({
                    url:"{{route("admin.user.restore")}}",
                    data:{id}
                }).then(res=>{
                    if(res.code==200){
                        $(current).removeClass('btn btn-secondary btn-circle btn-lg').addClass('btn btn-info btn-circle btn-lg');
                        swal({
                            title: "Success!",
                            text: res.msg,
                            type: "success",
                            confirmButtonText: "Cool"
                        });
                        window.location.reload();
                    }else{
                        swal({
                            title: "error!",
                            text: res.msg,
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                    }

                })
            }
        }
    </script>
    @endsection

{{--    @section('js')--}}
{{--        --}}
{{--    @endsection--}}
