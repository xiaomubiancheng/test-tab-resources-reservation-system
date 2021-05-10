<script src="{{asset('static')}}/layer/layer.js"></script>
<script>
    @if($errors->any())
        let err='';
        @foreach($errors->all() as $error)
            err+= "{{$error}}\n";
        @endforeach
        layer.alert(err);
    @endif
</script>

