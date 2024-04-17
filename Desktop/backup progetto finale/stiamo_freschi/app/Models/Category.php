<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function Announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function translatedName()
    {
    return __('ui.' . strtolower($this->name));
    }

}
