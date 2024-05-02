<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PutusanPn extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'putusan_pn';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
