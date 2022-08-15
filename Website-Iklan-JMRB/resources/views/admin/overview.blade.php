@extends('admin/dashboard')
@section('content')
@section('title',  'Dashboard-Overview')
@section('subtitle',  'Overview')
<div class="container">
    <h2>( {{ count($iklan) }} )</h2>
    <h2>( {{ count($admin) }} )</h2>
    <h2>( {{ count($user) }} )</h2>
</div>
@endsection