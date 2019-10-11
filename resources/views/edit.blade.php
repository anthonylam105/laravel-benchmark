@extends('layouts.app')



@section('content')

	<div id="app">
        <user-form user_id="{{ $id }}">{{ csrf_field() }}</user-form>
    </div>

@endsection