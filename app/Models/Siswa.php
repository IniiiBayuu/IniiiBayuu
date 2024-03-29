<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
   
    // field apa saja yang bisa di isi
    public $fillable = ['nama', 'nis', 'agama', 'jenis_kelamin', 'alamat', 'tgl_lahir'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;

    public function wali()
    {
        //data dari model 'siswa' bisa memiliki 1 data
        // dari model 'wali' melalui id_siswa
        return $this->hasOne(Wali::class, 'id_siswa');
    }
}
