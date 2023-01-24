<?php

namespace Tests\Unit;

use Illuminate\Http\Response;
use Tests\TestCase;

class ZipcodeTest extends TestCase
{
    public function test_get()
    {
        $zip_code = "55790";
        $response = $this->getJson("/api/zip-codes/{$zip_code}");
        logger($response->getContent());
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([]);
    }
}
