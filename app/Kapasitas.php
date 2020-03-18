<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kapasitas extends Model
{
    public function layanan(){
        return $this->BelongsTo(Layanan::class,'idlayanan');
    }
}
