
@extends('layouts.main')

@section('tartalom')

<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="../css/foundation.min.css">
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
<h1>Képgalériák</h1>
<p class="lead">Új Képgaléra készítése</p>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
	<div class="valami">Új Képgaléra készítése (űrlap)
{!! Form::open(['action' => 'GalleryController@store', 
'enctype' => 'multipart/form-data']) !!}
   {!! Form::label('nev','Név') !!}
                  {!! Form::text('nev', $value=null, $attributes=['placeholder'=>'Galéria neve', 'name'=>'nev']) !!}

                  {!! Form::label('leiras','Leírás') !!}
                  {!! Form::text('leiras', $value=null, $attributes=['placeholder'=>'Galéria leírása', 'name'=>'leiras']) !!}

                  {!! Form::label('boritokep','Borítókép') !!}
                  {!! Form::file('boritokep') !!}

                  {!! Form::submit('Létrehozás', $attributes=['class'=>'button']) !!}
                  
{!! Form::close() !!}
</div>
</div>


</div>
@stop

