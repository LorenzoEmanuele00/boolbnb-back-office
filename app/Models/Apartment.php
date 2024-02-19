<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Apartment extends Model
{
    use HasFactory;

    public $fillable = ['title', 'slug', 'price', 'address', 'latitude', 'longitude', 'dimension_mq', 'rooms_number', 'beds_number', 'bathrooms_number', 'is_visible'];

    public function setTitleAttribute($_title) {
        $this->attributes['title'] = $_title;
        $this->attributes['slug']  = Str::slug($_title);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
