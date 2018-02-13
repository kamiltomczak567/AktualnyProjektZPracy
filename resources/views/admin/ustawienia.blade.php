@extends('admin.master')

@section('content')

<div class="page-header">
	<h1 class="page-title">Ustawienia</h1>
</div>

@foreach($settings as $item)
<setting :item='{!! $item->toJson() !!}' :options='{!! $item->description !!}'></setting>
@endforeach

@endsection


