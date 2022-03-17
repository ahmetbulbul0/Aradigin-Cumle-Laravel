@extends('author.layout')

@section('content')
    @include('author.components.menu')

    @isset($data['editedData'])
        @include('author.components.edited_data_detail')
    @endisset

    @include('author.components.news_edit')
@endsection
