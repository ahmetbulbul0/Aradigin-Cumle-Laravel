@extends('system.layout')

@section('content')
    @include('system.components.menu')

    @isset($data['createdData'])
        @include('system.components.created_data_detail')
    @endisset

    @include('system.components.user_create')
@endsection
