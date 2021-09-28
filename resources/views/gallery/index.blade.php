
@extends('layouts.main')

@section('tartalom')


<div class="off-canvas-content" data-off-canvas-content>
<div class="title-bar hide-for-large">
<div class="title-bar-left">
<button class="menu-icon" type="button" data-toggle="fomenu"></button>
<span class="title-bar-title">Laravel képgaléria</span>
</div>
</div>

@if(Session::has('uzenet'))

<div class="callout success" onClick="$(this).fadeOut()">
{{Session::get('uzenet')}}
<button class="close-button" type="button">&times</button>	
</div>
@endif

<div class="callout primary">
<div class="row column">
<h1>Képgalériák</h1>
<p class="lead">Képgaléra készítése</p>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">

<?php

foreach($galleries as $gallery){
?>
<!--Fontos hogy az adatbázisban ne sima kötöjellel legyen a cover image mező elnevezés, hanem így ahogy most van, mert nem fog működni semmi......blad-el is ki lehet iratni {{ $gallery->cover_image }}    -->
<div class="column">
	<a href="gallery/show/{{ $gallery->id }}">
<img class="thumbnail" src="boritokepek/<?php echo $gallery->cover_image ?>">
</a>
<h5>{{ $gallery->name }}</h5>
<p>{{ $gallery->description }}</p>
</div>
<?php
}

?>



</div>
@stop

