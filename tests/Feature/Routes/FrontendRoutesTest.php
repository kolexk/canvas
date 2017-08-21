<?php

namespace Tests\Feature\Routes;

use Tests\TestCase;
use Tests\CreatesUser;
use Tests\InteractsWithDatabase;

class PublicRoutesTest extends TestCase
{
    use InteractsWithDatabase, CreatesUser;

    /**
    * Smoke test each URI and compare the response codes.
    *
    * @test
    *
    * @dataProvider uriWithResponseCodeProvider
    **/
    public function it_gets_proper_response_codes_from_frontend_uris($uri, $responseCode)
    {
        $response = $this->call('GET', $uri);
        $this->assertEquals($responseCode, $response->status());
    }

    public function uriWithResponseCodeProvider()
    {
        return [
            ['/', 200],
            ['/blog/post/hello-world', 200],
            ['/blog?tag=Getting+Started', 200],
            ['/admin', 200],
            ['/password/forgot', 200],
            ['/non-existing', 404],
        ];
    }
}