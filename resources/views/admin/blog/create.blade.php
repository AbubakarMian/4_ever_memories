<?php
if($control == 'edit'){
    $heading = 'Edit';
}
else{
    $heading = 'Add A New Blog';
}
?>
@extends('layouts.default_edit')
@section('heading')
    {!! $heading !!}
@endsection
@section('leftsideform')

    @if($control == 'edit')
        {!! Form::model($blog,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['blog.update', $blog->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['blog.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.blog.partial.form')
    {!!Form::close()!!}

@include('partial_layouts.cropper.cropper_html')


@endsection
{!!Form::close()!!}




