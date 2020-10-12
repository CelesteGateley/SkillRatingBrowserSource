@extends('layouts.app')

@section('content')
<script>
    $(document).ready(function () {
        $("code").each(function (index) {
            $(this).click(function() {

               document.execCommand("copy");
            });
        });
    });
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Stream Information</div>
                {{ dd($damageChanges) }}
                <div class="card-body">
                    <h3>Browser Sources:</h3>
                    <b>Default:</b> <a href="{{ route('default_source', ['apiKey' => Auth::user()->api_key]) }}">{{ route('default_source', ['apiKey' => Auth::user()->api_key]) }}</a><br>
                    <b>Tank:</b> <a href="{{ route('tank_source', ['apiKey' => Auth::user()->api_key]) }}">{{ route('tank_source', ['apiKey' => Auth::user()->api_key]) }}</a><br>
                    <b>Damage:</b> <a href="{{ route('damage_source', ['apiKey' => Auth::user()->api_key]) }}">{{ route('damage_source', ['apiKey' => Auth::user()->api_key]) }}</a><br>
                    <b>Support:</b> <a href="{{ route('support_source', ['apiKey' => Auth::user()->api_key]) }}">{{ route('support_source', ['apiKey' => Auth::user()->api_key]) }}</a><br>
                    <br>
                    <h3>Nightbot Commands:</h3>
                    <code id="copy">!addcom !addsr -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/add/$(1))</code><br>
                    <code id="copy">!addcom !subsr -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/subtract/$(1))</code><br>
                    <code id="copy">!addcom !showtank -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/change/1)</code><br>
                    <code id="copy">!addcom !showdmg -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/change/2)</code><br>
                    <code id="copy">!addcom !showsup -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/change/3)</code><br>
                    <code id="copy">!addcom !addtanksr -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/add/tank/$(1))</code><br>
                    <code id="copy">!addcom !subtanksr -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/subtract/tank/$(1))</code><br>
                    <code id="copy">!addcom !adddpssr -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/add/damage/$(1))</code><br>
                    <code id="copy">!addcom !subdpssr -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/subtract/damage/$(1))</code><br>
                    <code id="copy">!addcom !addsupsr -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/add/support/$(1))</code><br>
                    <code id="copy">!addcom !subsupsr -ul=moderator $(urlfetch {{ route('home') }}/api/{{ Auth::user()->api_key }}/subtract/support/$(1))</code><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
