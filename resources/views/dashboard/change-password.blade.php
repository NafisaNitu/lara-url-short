@extends('layouts.dashboard')

@section('content')
    <password-page-component :profile="{{ Auth::user() }}"></password-page-component>
@endsection
