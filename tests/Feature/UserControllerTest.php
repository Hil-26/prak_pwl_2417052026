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

    public function test_user_edit_page_can_be_rendered(): void
    {
        $kelas = Kelas::create(['nama_kelas' => 'D']);
        $user = UserModel::create([
            'name' => 'Bob Smith',
            'npm' => '2417052028',
            'kelas_id' => $kelas->id,
        ]);

        $response = $this->get('/user/' . $user->id . '/edit');
        $response->assertStatus(200);
        $response->assertSee('EDIT USER RECORD');
        $response->assertSee('Bob Smith');
        $response->assertSee('2417052028');
    }

    public function test_user_can_be_updated(): void
    {
        $kelas1 = Kelas::create(['nama_kelas' => 'E']);
        $kelas2 = Kelas::create(['nama_kelas' => 'F']);
        $user = UserModel::create([
            'name' => 'Alice Wonder',
            'npm' => '2417052029',
            'kelas_id' => $kelas1->id,
        ]);

        $response = $this->put('/user/' . $user->id, [
            'nama' => 'Alice Wonderland',
            'npm' => '2417052030',
            'kelas_id' => $kelas2->id,
        ]);

        $response->assertRedirect('/user');
        $response->assertSessionHas('success', 'Data user berhasil diperbarui!');

        $this->assertDatabaseHas('user', [
            'id' => $user->id,
            'name' => 'Alice Wonderland',
            'npm' => '2417052030',
            'kelas_id' => $kelas2->id,
        ]);
    }

    public function test_user_can_be_deleted(): void
    {
        $kelas = Kelas::create(['nama_kelas' => 'G']);
        $user = UserModel::create([
            'name' => 'Delete Me',
            'npm' => '2417052031',
            'kelas_id' => $kelas->id,
        ]);

        $response = $this->delete('/user/' . $user->id);

        $response->assertRedirect('/user');
        $response->assertSessionHas('success', 'Data user berhasil dihapus!');

        $this->assertDatabaseMissing('user', [
            'id' => $user->id,
        ]);
    }
}
