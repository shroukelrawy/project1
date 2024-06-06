@extends('layout.client')

@section('menu')
    <li><a href="#">Test Menu Item</a></li>
@endsection

@push('submenu')
    <li><a href="#">Test Submenu Item 1</a></li>
@endpush

@push('submenu')
    <li><a href="#">Test Submenu Item 2</a></li>
@endpush

@prepend('submenu')
    <li><a href="#">Test Submenu Item 4</a></li>
@endprepend

@section('content')
    <h1>Welcome to the Example Page</h1>
@endsection
