@extends('layouts.app')

@section('content')
<div class="flex-center full-height">
    <div>
        <label for="search-box"><img alt="logo" src="/img/logo.svg" class="img" /></label>
    </div>
    <div class="search">
        <form method="post" action="/search">
            {{csrf_field()}}
            <input id="search-box" name="query" type="text" placeholder="search term" required />
            <button type="submit">Search for Artists</button>
        </form>
    </div>
</div>
@endsection
