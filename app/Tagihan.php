<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihans';
    protected $primaryKey = 'idtagihan';

    public function daftarlayanan(){
        return $this->BelongsTo(Daftarlayanan::class,'iddaftar');
    }
}
