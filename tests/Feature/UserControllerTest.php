<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Kelas;
use App\Models\UserModel;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_index_page_can_be_rendered(): void
    {
        $kelas = Kelas::create(['nama_kelas' => 'A']);
        UserModel::create([
            'name' => 'John Doe',
            'npm' => '2417052026',
            'kelas_id' => $kelas->id,
        ]);

        $response = $this->get('/user');

        $response->assertStatus(200);
        $response->assertSee('John Doe');
        $response->assertSee('2417052026');
        $response->assertSee('A');
    }

    public function test_user_create_page_can_be_rendered(): void
    {
        Kelas::create(['nama_kelas' => 'B']);

        $response = $this->get('/user/create');

        $response->assertStatus(200);
        $response->assertSee('B');
    }

    public function test_user_can_be_stored(): void
    {
        $kelas = Kelas::create(['nama_kelas' => 'C']);

        $response = $this->post('/user', [
            'nama' => 'Jane Doe',
            'npm' => '2417052027',
            'kelas_id' => $kelas->id,
        ]);

        $response->assertRedirect('/user');

        $this->assertDatabaseHas('user', [
            'name' => 'Jane Doe',
            'npm' => '2417052027',
            'kelas_id' => $kelas->id,
        ]);
    }
}
