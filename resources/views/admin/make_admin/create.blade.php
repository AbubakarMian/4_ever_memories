<?php
if($control == 'edit'){
    $heading = 'Edit';
}
else{
    $heading = 'Add Transport';
}
?>
@extends('layouts.default_edit')
@section('heading')
    {!! $heading !!}
@endsection
@section('leftsideform')

    @if($control == 'edit')
        {!! Form::model($make_admin,['id'=>'my_form', 'method' => 'POST', 'route' =>
                  ['make_admin.update', $make_admin->id],'files'=>true]) !!}
    @else
        {!! Form::open(['id'=>'my_form','method' => 'POST', 'route' => ['make_admin.save' ], 'files'=>true]) !!}
    @endif
    @include('admin.make_admin.partial.form')
    {!!Form::close()!!}

@include('partial_layouts.cropper.cropper_html')


@endsection
{!!Form::close()!!}




