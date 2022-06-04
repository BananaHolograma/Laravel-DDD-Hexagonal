<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopEloquentModel extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'shops';

    protected $fillable = ['id', 'name', 'url'];

}
