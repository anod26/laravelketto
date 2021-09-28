
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
<h1>Képgalériák</h1>
<p class="lead">Új Fotó készítése</p>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
	<div class="valami">Új Képgaléra készítése (űrlap)
{!! Form::open(['action' => 'PhotoController@store', 
'enctype' => 'multipart/form-data']) !!}
   {!! Form::label('cim','Cím') !!}
   {!! Form::text('cim', $value=null, $attributes=['placeholder'=>'Fotó címe', 'name'=>'cim']) !!}

   {!! Form::label('leiras','Leírás') !!}
   {!! Form::text('leiras', $value=null, $attributes=['placeholder'=>'Fotó leírása', 'name'=>'leiras']) !!}


   {!! Form::label('helyszin','Helyszín (ha van)') !!}
   {!! Form::text('helyszin', $value=null, $attributes=['placeholder'=>'Hol készült a fotó', 'name'=>'helyszin']) !!}

   {!! Form::label('kepkep','Kép') !!}
   {!! Form::file('kep') !!}
   <!-- A photocontroller-ből kapunk egy id-t és az kerül ide bele: -->
   <input type="hidden" name="galeria" value="{{$gallery_id}}">
   {!! Form::submit('Feltölés', $attributes=['class'=>'button']) !!}
                  
   {!! Form::close() !!}
</div>
</div>


</div>
@stop

