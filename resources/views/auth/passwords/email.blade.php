



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
    <div class="valami"><h4>Elfelejtett jelszó újragenerálása</h4>
   <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="button btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
</div>
</div>


</div>
@stop































































