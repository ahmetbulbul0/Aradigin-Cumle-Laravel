@extends('author.layout')

@section('content')
    @include('author.components.menu')

    @isset($data['createdData'])
        @include('author.components.created_data_detail')
    @endisset

    @include('author.components.news_create')
@endsection
