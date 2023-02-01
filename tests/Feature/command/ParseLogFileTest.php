<?php

namespace Tests\Feature\command;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParseLogFileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Parse_Log_File()
    {
        $this->artisan('parse:logFile')->assertExitCode(0);
    }
}
