@extends('admin.master')

@section('content')

<div class="page-header">
	<h1 class="page-title">Projekty</h1>
</div>

<Projects :projects='{!! json_encode($projects) !!}'></Projects>

@endsection


