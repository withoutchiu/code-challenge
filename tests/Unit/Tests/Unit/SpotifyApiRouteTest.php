<?php

namespace Tests\Unit;

use Tests\TestCase;

class SpotifyApiRouteTest extends TestCase
{
    /**
     * Post method search testing
     * This is to test if api is successful
     * @return void
     */
    public function testSpotifySearch(){
        $response = $this->call('POST', '/search', ['query' => 'Taylor']);
        $this->assertEquals(200, $response->status());
    }

    /**
     * Search by Album testing with specific test ID
     * This is to test if api is successful
     * @return void
     */
    public function testSpotifySearchByAlbum(){
        $response = $this->call('GET', '/search/album/4aawyAB9vmqN3uQ7FjRGTy');
        $this->assertEquals(200, $response->status());
    }

    /**
     * Search by Artist testing with specific test ID
     * This is to test if api is successful
     * @return void
     */
    public function testSpotifySearchByArtist(){
        $response = $this->call('GET', '/search/artist/0TnOYISbd1XYRBk9myaseg');
        $this->assertEquals(200, $response->status());
    }

    /**
     * Search by Track testing with specific test ID
     * This is to test if api is successful
     * @return void
     */
    public function testSpotifySearchByTrack(){
        $response = $this->call('GET', '/search/track/11dFghVXANMlKmJXsNCbNl');
        $this->assertEquals(200, $response->status());
    }
}
