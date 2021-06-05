<?php

namespace Tests\Feature\Http\Users;

use Tests\TestCase;
use Tests\HasDummyUser;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class DestroyUserTest extends TestCase {
    use DatabaseMigrations,
        HasDummyUser;

    /**
     * Test if destroy user responds with 200 status code.
     */
    public function testDestroyUserRespondsWithOk () {
        $user = $this->createDummyUser();

        $this->deleteJson("/api/users/$user->id")
            ->assertOk();
    }

    /**
     * Test if destroy user responds with 404 status code.
     */
    public function testDestroyUserRespondsWithNotFound () {
        $this->deleteJson("/api/users/user-does-not-exists")
            ->assertNotFound();
    }

    /**
     * Test if destroy user removes it from database.
     */
    public function testDestroyUserRemovesItFromDatabase () {
        $user = $this->createDummyUser();

        $this->deleteJson("/api/users/$user->id");

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
