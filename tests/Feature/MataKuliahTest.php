<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\MataKuliah;

class MataKuliahTest extends TestCase
{
    use DatabaseTransactions;

    public function test_matakuliah_index_page_can_be_rendered(): void
    {
        $mk = MataKuliah::create([
            'nama_mk' => 'Pemrograman Web Lanjut',
            'sks' => 3,
        ]);

        $this->assertNotEmpty($mk->id);
        $this->assertEquals(36, strlen($mk->id)); // UUID length is 36

        $response = $this->get('/matakuliah');
        $response->assertStatus(200);
        $response->assertSee('Daftar Mata Kuliah');
        $response->assertSee('Pemrograman Web Lanjut');
        $response->assertSee('3');
        $response->assertSee($mk->id);
    }

    public function test_matakuliah_create_page_can_be_rendered(): void
    {
        $response = $this->get('/matakuliah/create');
        $response->assertStatus(200);
        $response->assertSee('Buat Mata Kuliah Baru');
    }

    public function test_matakuliah_can_be_stored(): void
    {
        $response = $this->post('/matakuliah', [
            'nama_mk' => 'Algoritma dan Pemrograman',
            'sks' => 4,
        ]);

        $response->assertRedirect('/matakuliah');

        $this->assertDatabaseHas('mata_kuliah', [
            'nama_mk' => 'Algoritma dan Pemrograman',
            'sks' => 4,
        ]);

        $created = MataKuliah::where('nama_mk', 'Algoritma dan Pemrograman')->first();
        $this->assertNotNull($created);
        $this->assertEquals(36, strlen($created->id));
    }

    public function test_matakuliah_edit_page_can_be_rendered(): void
    {
        $mk = MataKuliah::create([
            'nama_mk' => 'Sistem Operasi',
            'sks' => 3,
        ]);

        $response = $this->get('/mata-kuliah/' . $mk->id . '/edit');
        $response->assertStatus(200);
        $response->assertSee('Edit Mata Kuliah');
        $response->assertSee('Sistem Operasi');
        $response->assertSee('3');
    }

    public function test_matakuliah_can_be_updated(): void
    {
        $mk = MataKuliah::create([
            'nama_mk' => 'Jaringan Komputer',
            'sks' => 3,
        ]);

        $response = $this->put('/mata-kuliah/' . $mk->id, [
            'nama_mk' => 'Jaringan Komputer Lanjut',
            'sks' => 4,
        ]);

        $response->assertRedirect('/mata-kuliah');
        $response->assertSessionHas('success', 'Data berhasil diperbarui!');

        $this->assertDatabaseHas('mata_kuliah', [
            'id' => $mk->id,
            'nama_mk' => 'Jaringan Komputer Lanjut',
            'sks' => 4,
        ]);
    }

    public function test_matakuliah_can_be_deleted(): void
    {
        $mk = MataKuliah::create([
            'nama_mk' => 'Basis Data',
            'sks' => 3,
        ]);

        $response = $this->delete('/mata-kuliah/' . $mk->id);

        $response->assertRedirect('/mata-kuliah');
        $response->assertSessionHas('success', 'Data berhasil dihapus!');

        $this->assertDatabaseMissing('mata_kuliah', [
            'id' => $mk->id,
        ]);
    }
}
