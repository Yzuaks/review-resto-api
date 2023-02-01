<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Resto;

class RestoTest extends TestCase
{

    use RefreshDatabase;

 public function test_user_can_list_all_resto()
 {
    $count = 5;
    $data = Resto::factory()->count(5)->create();

    $this->getJson(route('restos.index'))
    ->assertOK()
    ->assertJsonCount($count);
 }

 public function test_user_can_create_resto()
 {
    //
 }

 public function test_user_can_show_resto()
 {
    //
 }
 public function test_user_can_edit_resto()
 {
    //
}
 public function test_user_can_delete_resto()
 {
    //
 }

}
