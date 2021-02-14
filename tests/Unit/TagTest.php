<?php

namespace Tests\Unit;

use App\Models\Tags\Tag;
use Faker\Factory;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function test_create_tag()
    {
        $faker = Factory::create();
        $data = [
            'name' => $faker->sentence,
        ];

        $this->post("/api/tags", $data)
            ->assertStatus(201);

    }

    /**
     *
     * @return void
     */
    public function test_get_tags()
    {
        $this->get("/api/tags")->assertStatus(200);
    }

    public function test_delete_tag()
    {
        $tag = factory(Tag::class)->create();
        $this->delete("/api/tags/" . $tag->id)
        ->assertStatus(200);
    }
}
