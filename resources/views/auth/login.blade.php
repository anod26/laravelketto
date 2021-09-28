

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
    <div class="valami"><h2>Bejelentkezés</h2>
 <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row {{ __('E-Mail Address') }}">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Cím</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ __('Password') }}">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Jelszó</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label {{ __('Remember Me') }}" for="remember">
                                        Emlékezz rám
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 {{ __('Login') }}">
                                <button type="submit" class=" button btn btn-primary">
                                    Belépés
                                </button><br>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link {{ __('Forgot Your Password?') }}" href="{{ route('password.request') }}">
                                        Elfelejtett jelszó
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
</div>
</div>


</div>
@stop


















































