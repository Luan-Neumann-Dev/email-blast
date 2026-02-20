<?php

use Tests\TestCase;

class ExampleTest extends TestCase {

    public function test_example() {
        $this->assertDatabaseCount('users', 0);
    }

}
