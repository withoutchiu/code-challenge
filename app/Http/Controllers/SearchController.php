<?php

namespace App\Http\Controllers;

use App\Traits\SpotifyApiTraits;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // SpotifyApiTraits = Traits for using Spotify API Functionality, Can be reused by declaring below code
    use SpotifyApiTraits;

    /**
     * Controller for index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Search for Track, Album, Artist
     * @throws GuzzleException
     */
    public function search(Request $request)
    {
        $query = $request->get('query');
        return view('search', ['searchTerm' => $query, 'payload' => $this->spotifySearch($query)]);
    }

    /**
     * Specific search for Album using its Hash ID
     * @throws GuzzleException
     */
    public function searchByAlbum($id){
        return view('album_details', ['payload' => $this->spotifySearchByAlbum($id)]);
    }

    /**
     * Specific Search for Artist using its Hash ID
     * @throws GuzzleException
     */
    public function SearchByArtist($id){
        return view('artist_details', ['payload' => $this->spotifySearchByArtist($id)]);
    }

    /**
     * Specific Search for Track using its Hash ID
     * @throws GuzzleException
     */
    public function SearchByTrack($id){
        return view('track_details', ['payload' => $this->spotifySearchByTrack($id)]);
    }
}
