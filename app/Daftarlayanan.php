<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftarlayanan extends Model
{
    protected $table = 'daftarlayanans';
    protected $primaryKey = 'iddaftar';

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class);
    }

    public function layanan(){
        return $this->BelongsTo(Layanan::class, 'idlayanan');
    }
}
