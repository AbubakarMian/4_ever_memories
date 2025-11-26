
{{-- <input name="invisible" type="hidden" value="{{ $category->id }}"> --}}

<div class="form-group">
    {!! Form::label('name','Full Name') !!}
    <div>
        {!! Form::text('full_name', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Full Name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name','Short Name') !!}
    <div>
        {!! Form::text('short_name', null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Short Name','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('category','Category') !!}
    <div>
        {!! Form::text('category',  null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Category','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('start_date','Start Date') !!}
    <div>
        {!! Form::date('start_date',  null, ['class' => 'form-control',
        'data-parsley-required'=>'true',
        'data-parsley-trigger'=>'change',
        'placeholder'=>'Start Date','required',
        'maxlength'=>"100"]) !!}
    </div>
</div>




<?php
$image = asset('public/images/logo.png');

if (isset($courses)) {
if ($courses->avatar) {
$image = $courses->avatar;
}
}
?>

<div class="form-group">

    <div class="form-group pull-right">
        <img width="100px" src="{!! $image !!}" class="show-product-img imgshow">
    </div>

    <div class="form-group">

        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['class' => 'choose-image', 'id' => 'image']) !!}
        <p class="help-block" id="error">Limit 2MB</p>
    </div>

</div>
@include('admin.courses.partial.image_modal')

{!! Form::label('description', 'Description') !!}
    <div >

    <div>
        {!! Form::textarea('description', null, ['class' => 'ckeditor form-control' , 'id'=>'summary-ckeditor', 'data-parsley-required' => 'true', 'data-parsley-trigger' => 'change', 'placeholder' => 'Enter title', 'required', 'maxlength' => '100']) !!}
    </div>



</div>





<span id="err" class="error-product"></span>


<div class="form-group col-md-12">
</div>





<div class="col-md-5 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-lg btn-parsley medsaveclick', 'onblur' => 'return validateForm();']) !!}
        </div>
    </div>
</div>



@section('app_jquery')
<script>
    function validateForm() {
        return true;
    }

</script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection

