@extends('system.layout')

@section('content')
    @include("system.components.menu")

    @include("system.components.news_edit")

    @isset($data['editedData'])
        @include("system.components.edited_data_detail")
    @endisset
@endsection
