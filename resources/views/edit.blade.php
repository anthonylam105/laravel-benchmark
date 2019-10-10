@extends('layouts.app')



@section('content')

	<div id="app">
        <edit-component user_id="{{ $id }}">{{ csrf_field() }}</edit-component>
    </div>

@endsection