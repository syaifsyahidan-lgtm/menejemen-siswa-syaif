<?php

namespace Tests\Feature;

use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiswaTest extends TestCase
{
    use RefreshDatabase;

    private function dataValid(array $override = []): array
    {
        return array_merge([
            'nis' => '9999001',
            'nama' => 'Siswa Uji',
            'jenis_kelamin' => 'L',
            'tanggal_lahir' => '2008-01-01',
            'kelas' => 'X-IPA-1',
            'email' => 'uji@example.com',
            'alamat' => 'Alamat uji',
        ], $override);
    }

    public function test_halaman_daftar_siswa_bisa_dibuka(): void
    {
        $this->get('/siswa')->assertStatus(200);
    }

    public function test_bisa_menambah_siswa(): void
    {
        $this->post('/siswa', $this->dataValid())
             ->assertRedirect(route('siswa.index'));

        $this->assertDatabaseHas('siswa', ['nis' => '9999001']);
    }

    public function test_nis_wajib_diisi(): void
    {
        $this->post('/siswa', $this->dataValid(['nis' => '']))
             ->assertSessionHasErrors('nis');
    }

    public function test_bisa_mengubah_siswa(): void
    {
        $siswa = Siswa::create($this->dataValid());

        $this->put("/siswa/{$siswa->id}", $this->dataValid(['nama' => 'Nama Baru']))
             ->assertRedirect(route('siswa.index'));

        $this->assertDatabaseHas('siswa', ['id' => $siswa->id, 'nama' => 'Nama Baru']);
    }

    public function test_bisa_menghapus_siswa(): void
    {
        $siswa = Siswa::create($this->dataValid());

        $this->delete("/siswa/{$siswa->id}")
             ->assertRedirect(route('siswa.index'));

        $this->assertDatabaseMissing('siswa', ['id' => $siswa->id]);
    }
}
