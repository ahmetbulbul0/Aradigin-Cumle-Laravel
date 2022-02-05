@extends('system.layout')

@section('content')
    @include("system.components.menu")

    @include("system.components.category_create")
    @isset($data['createdData'])
        @include("system.components.created_data_detail")
    @endisset
@endsection
