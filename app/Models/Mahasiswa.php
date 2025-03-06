<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Nama tabel dalam database
    protected $primaryKey = 'npm'; // Primary key tabel
    public $timestamps = false; // Jika tidak menggunakan timestamps (created_at, updated_at)

    protected $fillable = [
        'npm', 'nama', 'ttl', 'jenis_kelamin', 'agama',
        'tahun_akademik', 'prodi', 'jurusan', 'semester',
        'alamat', 'email', 'no_hp'
    ];
}
