@extends('admin.master')

@section('content')

<div class="page-header">
	<h1 class="page-title">Oferta</h1>
</div>

@foreach($settings as $item)
<setting :item='{!! $item->toJson() !!}' :options='{!! $item->description !!}'></setting>
@endforeach

<oferta :projects='{!! json_encode($settings) !!}'></oferta>

@endsection


