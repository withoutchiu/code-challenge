@extends('layouts.app')

@section('content')
    <div class="card">
        <a href="javascript:history.back()">Back</a>
        <div class="card-body">
            <h5 class="card-title">Artist Name: {{$payload['name']}}</h5>
            <p class="card-text">Total Followers: {{number_format($payload['followers']['total'])}}</p>
            <p class="card-text">Genres:</p>
            <ul>
                @foreach($payload['genres'] as $genre)
                    <li>{{$genre}}</li>
                @endforeach
            </ul>
            <p class="card-text">Popularity: {{$payload['popularity']}}</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:  {{$payload['popularity']}}%" aria-valuenow=" {{$payload['popularity']}} " aria-valuemin="0" aria-valuemax="100">Popularity</div>
            </div>
            <p class="card-text">Click on the link below to Listen: <a href="{{$payload['external_urls']['spotify']}}" target="_blank"> Listen Now!</a> </p>

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
