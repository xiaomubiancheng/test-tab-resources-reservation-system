<script>
@if(session()->has('success'))
    let msg = "{{session('success')}}";
layer.alert(msg);
@endif
</script>
