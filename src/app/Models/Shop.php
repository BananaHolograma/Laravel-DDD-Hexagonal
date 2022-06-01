<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'shops';

    protected $fillable = ['id', 'name', 'url'];

}
