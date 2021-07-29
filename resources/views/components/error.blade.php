@if(session('error'))
    <div class="alert alert-primary">
        {{session('error')}}
    </div>
@endif
