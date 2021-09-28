detalis.blade.php


@extends('layouts.main')

@section('tartalom')

<link rel="stylesheet" href="../../css/app.css">
<link rel="stylesheet" href="../../css/foundation.min.css">
<div class="off-canvas-content" data-off-canvas-content>
<div class="title-bar hide-for-large">
<div class="title-bar-left">
<style>
	.valami{
		padding: 20px;
	}
</style>
<button class="menu-icon" type="button" data-toggle="fomenu"></button>
<span class="title-bar-title">Laravel képgaléria</span>
</div>
</div>
<div class="callout primary">
<div class="row column">
<h1>{{$photo->title}}</h1>
<p class="lead">{{$photo->description}}</p>
<p>{{ $photo->location }}</p>
<a href="../../">Vissza a galériákhoz</a>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
	<div class="valami">
<img class="nagykep" src="../../fotok1/{{$photo->image}}">
 
</div>
</div>


</div>
@stop

