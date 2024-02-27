<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KelurahanDesa extends Model
{
    use HasFactory;

    protected $table = 'kelurahandesa';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    // protected $with = ['kecamatan', 'kabkota'];


    public function kabkota_ref(): HasOne
    {
        return $this->hasOne(Kabkota::class, 'id', 'kode_kab');
    }

    public function kecamatan_ref(): HasOne
    {
        return $this->hasOne(Kecamatan::class, 'id', 'kecamatan');
    }
}
