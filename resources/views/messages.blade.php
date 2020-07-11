@if(session()->has('success_msg'))
<p class="alert alert-success">
{{session()->get('success_msg')}}
</p>
@endif

@if(session()->has('error_msg'))
<p class="alert alert-danger">
{{session()->get('error_msg')}}
</p>
@endif