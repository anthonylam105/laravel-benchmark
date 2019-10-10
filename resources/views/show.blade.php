@extends('layouts.app')


@section('content')

	<div id="app">
        <show-component user_id="{{ $id }}"></show-component>
    </div>
	
@endsection