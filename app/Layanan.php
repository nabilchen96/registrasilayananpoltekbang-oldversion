<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanans';
    protected $primaryKey = 'idlayanan';

    public function Daftarlayanan(){
        return $this->hasMany(Daftarlayanan::class);
    }
}
