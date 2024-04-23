<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Stakeholder extends Model
{
    use HasFactory;

    protected $table = 'stakeholder';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
