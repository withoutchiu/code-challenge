@extends('layouts.app')

@section('content')
    <div class="card">
        <a href="javascript:history.back()">Back</a>
        <div class="card-body">
            <h5 class="card-title">Album Title: {{$payload['name']}}</h5>
            <p class="card-text">Artist: {{$payload['artists'][0]['name']}}</p>
            <p class="card-text">Label as: {{$payload['label']}}</p>
            <p class="card-text">Click on the link below to Listen: <a href="{{$payload['external_urls']['spotify']}}" target="_blank"> Listen Now!</a> </p>

            <p class="card-text">Tracks:</p>
            <ul>
                @foreach($payload['tracks']['items'] as $item)
                    <li>{{$item['name']}} - <a href="{{$item['external_urls']['spotify']}}" target="_blank">Listen Now!</a></li>
                @endforeach
            </ul>
            <p class="card-text"><small class="text-muted">Released on {{$payload['release_date']}}</small></p>
        </div>
        @if(isset($payload['images'][0]))
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Click here to Show/Hide Image
        </button>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">

                <img class="card-img-bottom" src="{{$payload['images'][0]['url']}}" alt="Spotify Image">

            </div>
        </div>
        @endif
    </div>
@endsection
