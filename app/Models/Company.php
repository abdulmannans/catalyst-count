<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kblais\QueryFilter\Filterable;

class Company extends Model
{
    use HasFactory, SoftDeletes, Filterable;
    protected $guarded = ['id'];
}
