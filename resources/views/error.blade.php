@if (count($errors))
@foreach($errors->all() as $error)
   
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {{ $error }}
    </div>
@endforeach
@endif
