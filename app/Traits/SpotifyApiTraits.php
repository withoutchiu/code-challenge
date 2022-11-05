<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

trait SpotifyApiTraits
{
    private $client;
    private $url;
    private $search_header;

    /**
     * Constructs the variables above
     * @throws GuzzleException
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->url = "https://api.spotify.com/v1/";
        $this->search_header = [
            'Authorization' => 'Bearer ' . $this->getAccess()->access_token,
            'Accept'        => 'application/json',
        ];
    }

    /**
     * Get Access from Spotify includes token, and its length
     * @throws GuzzleException
     */
    public function getAccess(){

        $response = $this->client->request('POST', config('app.spotify_api_token_url'), [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode(config('app.spotify_key') . ":" . config('app.spotify_secret'))
            ],
            'form_params'  => [
                'grant_type' => 'client_credentials'
            ]
        ]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Search Functionality Service
     * @throws GuzzleException
     */
    public function spotifySearch($q, $type = "album,track,artist")
    {
        $response = $this->client->request('GET', $this->url . 'search?q=' . $q . '&type=' . $type, [
            'headers' => $this->search_header
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Search by album service
     * @throws GuzzleException
     */
    public function spotifySearchByAlbum($id){
        $response = $this->client->request('GET', $this->url . 'albums/' . $id, [
            'headers' => $this->search_header
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Search by artist service
     * @throws GuzzleException
     */
    public function spotifySearchByArtist($id){
        $response = $this->client->request('GET', $this->url . 'artists/' . $id, [
            'headers' => $this->search_header
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Search by track service
     * @throws GuzzleException
     */
    public function spotifySearchByTrack($id){
        $response = $this->client->request('GET', $this->url . 'tracks/' . $id, [
            'headers' => $this->search_header
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function spotifySearchByTracksFeatures($id){
        $response = $this->client->request('GET', $this->url . 'audio-features/' . $id, [
            'headers' => $this->search_header
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
