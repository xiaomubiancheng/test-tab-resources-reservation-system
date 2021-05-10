
@extends('admin.layout.ucommon')


@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        吃饭不洗碗
   </div>
@endsection

@section('js')
    <script src="{{asset('static')}}/layer/layer.js"></script>
    <script>

        $.ajax({
            url:"{{route('admin.test.test')}}",
            type:"POST",
            dataType:'json',
            data:{ _token:"{{csrf_token()}}" },
            async:false,
            success:function (data) {
                console.log(data);
            }
        })

        console.log(111);


    </script>
@endsection




