@extends('author.layout')

@section('content')
    @include("author.components.menu")

    @include("author.components.news_create")
    @isset($data['createdData'])
        @include("author.components.created_data_detail")
    @endisset
@endsection
