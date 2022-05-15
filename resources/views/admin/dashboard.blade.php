@extends('admin.layout')
@section('title', 'Dashboard');
@section('dashboard_active', 'active')
@section('content')
<div class="row">
    <h1>Dashboard |</h1>
    <h1>| {{Config::get('constent.site_name')}}</h1>
</div>
@endsection