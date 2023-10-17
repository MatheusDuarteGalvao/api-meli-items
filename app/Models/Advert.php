<?php

namespace App\Models;

use App\Enums\AdvertStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'item_id',
        'status',
        'updated',
        'visits'
    ];

    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (AdvertStatus $status) => $status->name,
        );
    }
}
