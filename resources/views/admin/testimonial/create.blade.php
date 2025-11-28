<?php
if($control == 'edit'){
    $heading = 'Edit';
}
else{
    $heading = 'Add A New Testimonial';
}
?>
@extends('layouts.default_edit')
@section('heading')
    {!! $heading !!}
@endsection
@section('leftsideform')

    @if($control == 'edit')
        {!! Form::model($testimonial,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['testimonial.update', $testimonial->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['testimonial.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.testimonial.partial.form')
    {!!Form::close()!!}

@include('partial_layouts.cropper.cropper_html')


@endsection
{!!Form::close()!!}




