    @extends("admin.public.main")
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
                    <h4 class="page-title">房源属性列表</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">房源属性列表</li>
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
            <!-- basic table -->
            <div class="row" id="app">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">房源属性列表</h4>
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
                                        <th>用户名</th>
                                        <th>图标</th>
                                        <th>加入时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in items">
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" :value="item.id" name="ids[]" id="customControlValidation2" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-settings"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated slideInUp" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-eye"></i> Open</a>
                                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ti-comment-alt"></i> Comments</a>
                                                        <div v-html="item.actionBth"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>@{{item.id}}</td>
                                            <td v-html="item.name"></td>
                                            <td><img :src="item.icon" style="width: 50px;"></td>
                                            <td v-text="item.created_at"></td>
                                        </tr>
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


    <script>
        let _token = '{{ csrf_token() }}';
        $('.delete').click(function () {
            let url = $(this).attr("data-href");
            if(confirm("确定要删除吗？")){
                $.ajax({
                    url,
                    type:"delete",
                    data:{ _token}
                }).then(res=>{
                    $(this).parents("tr").remove();
                    swal({
                        title: "Success!",
                        text: res.msg,
                        type: "success",
                        confirmButtonText: "Cool"
                    });
                })
            }
        })
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

    @section('js')
        <script src="/js/vue.js"></script>
        <script>
            const app = new Vue({
                el:"#app",
                data:{
                    items:[]
                },
                mounted(){
                    $.ajax({
                        url:"{{route('admin.fangattr.index')}}",
                    }).then(res=>{
                        this.items = res;
                    })
                }
            })
        </script>

    @endsection
