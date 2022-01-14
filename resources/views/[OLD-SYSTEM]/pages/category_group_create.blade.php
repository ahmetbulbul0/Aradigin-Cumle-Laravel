@extends('private.layout')

@section('content')
    @include("private.components.menu")

    @include("private.components.category_group_create")
    @isset($data['createdData'])
        @include("private.components.created_data_detail")
    @endisset
@endsection
