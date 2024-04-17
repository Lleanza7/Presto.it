<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'price', 'description', 'category_id', 'user_id'];


    public function toSearchableArray()
    {

        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $category,
        ];
        return $array;
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public static function toBeRevisionedCount()
    {
        $logged_in_reviewer_id = Auth::id();
        return Announcement::where('is_accepted', null)
            ->where('user_id', '!=', $logged_in_reviewer_id)
            ->count();
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}