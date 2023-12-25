@if ($errors->any())
@foreach ($errors->all() as $error)
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times; </button>
    <strong>Error!</strong>
    {{$error}}
  </div>
@endforeach
@endif

{{-- @if (Session::has('success'))
<div class="alert alert-success">
   <p> {{Session::has('success')}}</p>
</div>
@endif --}}
@if(session('message'))
    <div class="alert alert-success">
        {{session()->get('message') }}
    </div>
@endif
