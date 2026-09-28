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
}
