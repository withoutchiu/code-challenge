@extends('layouts.app')

@section('content')
    <div class="card">
        <a href="javascript:history.back()">Back</a>
        <div class="card-body">
            <h5 class="card-title">Track Name: {{$payload['name']}}</h5>
            <div>
                <h5 class="card-title">Track Artists:</h5>
                <ol>
                    @foreach($payload['artists'] as $artist)
                        <li>{{$artist['name']}}</li>
                    @endforeach
                </ol>
            </div>
            <h5 class="card-title">Is Explicit: {{$payload['explicit'] ? 'Yes' : 'No'}}</h5>
            <p class="card-text">Duration: {{number_format(($payload['duration_ms']/1000)/60, 2)}} Minutes</p>
            <p class="card-text">Popularity: {{$payload['popularity']}}</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:  {{$payload['popularity']}}%" aria-valuenow=" {{$payload['popularity']}} " aria-valuemin="0" aria-valuemax="100">Popularity</div>
            </div>
            <p class="card-text">Preview Track:</p>
            <audio controls>
                <source src="{{$payload['preview_url']}}" type="audio/mpeg">
            </audio>
            <p class="card-text">Click on the link below to Listen: <a href="{{$payload['external_urls']['spotify']}}" target="_blank"> Listen Now!</a> </p>

        </div>
    </div>
@endsection
