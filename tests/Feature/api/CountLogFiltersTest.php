<?php

namespace Tests\Feature\api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountLogFiltersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_log_file_by_filters()
    {
        $response = $this->get('/api/logs/count?serviceNames=order')->decodeResponseJson();
        $this->assertArrayHasKey("count", $response);
    }
}
