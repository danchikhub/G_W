@if(session('success'))
    <div style="width: 300px;" class="alert alert-success">
        {{session('success')}}
    </div>
@endif