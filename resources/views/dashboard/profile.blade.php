@extends('layouts.dashboard')

@section('content')
    <profile-component :profile="{{ Auth::user() }}"></profile-component>
@endsection
