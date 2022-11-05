@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            Spotify API Search Result
        </div>
        <div class="card-body">
            <h5 class="card-title">Your Search Term Was: <b>{{$searchTerm}}</b></h5>
            <a href="/" class="btn btn-primary">Return to Home Page</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="col-md-12 card-title">
                <h3 class="text-center text-info">
                    Albums
                </h3>
            </div>
            @foreach($payload['albums']['items'] as $item)
                <div class="col">
                    <h2><a href="{{ route('search-by-album', $item['id']) }}" target="_self">{{$item['name']}}</a></h2>
                    {{--                        <td><a href="{{ route('search-by-artist', $item['id']) }}" target="_self">{{$item['name']}}</td>--}}
                    <p>Total Tracks: {{$item['total_tracks']}}</p>
                    <div class="card">
                        @if(isset($item['images'][0]))
                            <img class="card-img-top" src="{{$item['images'][0]['url']}}" alt="image-{{$item['name']}}" style="width:100%">
                        @else
                            <img class="card-img-top" src="{{asset('img/img_404.png')}}" alt="Card image" style="width:100%">
                        @endif
                        <div class="card-body">
                            <a href="{{ route('search-by-album', $item['id']) }}" class="btn btn-primary">See Album</a>
                        </div>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>

        <div class="col">
            <div class="col-md-12 card-title">
                <h3 class="text-center text-info">
                    Artist
                </h3>
            </div>
            @foreach($payload['artists']['items'] as $item)
                <div class="col">
                    <h2><a href="{{ route('search-by-artist', $item['id']) }}" target="_self">{{$item['name']}}</h2>
                    <div class="card">
                        @if(isset($item['images'][0]))
                            <img class="card-img-top" src="{{$item['images'][0]['url']}}" alt="image-{{$item['name']}}" style="width:100%">
                        @else
                            <img class="card-img-top" src="{{asset('img/img_404.png')}}" alt="Card image" style="width:100%">
                        @endif
                        <div class="card-body">
                            <a href="{{ route('search-by-artist', $item['id']) }}" class="btn btn-primary">See Artist</a>
                        </div>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>

        <div class="col">
            <div class="col-md-12 card-title">
                <h3 class="text-center text-info">
                    Tracks
                </h3>
            </div>
            <table class="table-responsive">
                <thead>
                <tr>
                    <th scope="col" class="col-md-4"> # </th>
                    <th scope="col" style="text-align: left">Name</th>
                    <th scope="col" style="text-align: left">Image</th>
                </tr>
                </thead>

                <tbody>
                @foreach($payload['tracks']['items'] as $item)
                    <tr>
                        <th scope="row" class="col-md-4">{{$loop->iteration}}</th>
                        <td><a href="{{ route('search-by-track', $item['id']) }}">{{$item['name']}}</a></td>
                        <td>
                            @if(isset($item['images'][2]))
                                <img src="{{$item['images'][2]['url']}}" alt="image-{{$item['name']}}">
                            @else
                                No Image Found.
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
