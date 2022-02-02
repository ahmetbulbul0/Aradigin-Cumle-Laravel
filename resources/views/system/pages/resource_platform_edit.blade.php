@extends('system.layout')

@section('content')
    @include("system.components.menu")

    @include("system.components.resource_platform_edit")

    @isset($data["editedData"])
        @include("system.components.edited_data_detail")
    @endisset
@endsection
