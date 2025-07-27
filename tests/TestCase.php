<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    /**
     * Set up the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');

        DB::delete("DELETE FROM addresses");
        DB::delete("DELETE FROM contacts");
        DB::delete("DELETE FROM users");
        // Additional setup can be done here if needed
    }
}
