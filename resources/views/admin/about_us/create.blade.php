<?php
if($control == 'edit'){
    $heading = 'Edit';
}
else{
    $heading = 'Add A New about_us';
}
?>
@extends('layouts.default_edit')
@section('heading')
    {!! $heading !!}
@endsection
@section('leftsideform')

    @if($control == 'edit')
        {!! Form::model($about_us,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['about_us.update', $about_us->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['about_us.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.about_us.partial.form')
    {!!Form::close()!!}

@include('partial_layouts.cropper.cropper_html')


@endsection
{!!Form::close()!!}




