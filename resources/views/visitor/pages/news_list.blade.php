@extends('visitor.layout')

@section('content')
    @include("visitor.components.menu")

    @include('visitor.components.big_list', ['data' => $data['bigList'][0]])
@endsection
