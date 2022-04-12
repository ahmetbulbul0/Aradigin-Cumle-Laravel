@extends('visitor.layout')

@section('content')
    @include('visitor.components.menu')

    @include('visitor.components.small_2_list_one', ['data' => $data['smallList2One'][0]])

    @include('visitor.components.middle_2_list', ['data' => $data['middle2List'][0]])

    @include('visitor.components.middle_2_list', ['data' => $data['middle2List'][1]])

    @include('visitor.components.middle_2_list', ['data' => $data['middle2List'][2]])

    @include('visitor.components.middle_2_list', ['data' => $data['middle2List'][3]])

    @include('visitor.components.big_list', ['data' => $data['bigList'][0]])

@endsection
