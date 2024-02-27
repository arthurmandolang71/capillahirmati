<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AkteLahir extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'akte_lahir';
    protected $fillable = [];
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function kecamatan_ref(): HasOne
    {
        return $this->hasOne(Kecamatan::class, 'id', 'kecamatan');
    }

    public function kelurahan_ref(): HasOne
    {
        return $this->hasOne(KelurahanDesa::class, 'id', 'kelurahan');
    }

    public function user_ref(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
