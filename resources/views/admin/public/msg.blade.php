@if($errors->any())
    @foreach($errors->all() as $error)
        <div style="color: red;margin:15px 0px 0px 15px">
            {{$error}}
        </div>
    @endforeach
@endif
