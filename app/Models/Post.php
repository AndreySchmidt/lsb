<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes; // trait

    protected $table = 'posts';
    protected $guarded = false;
    // protected $guarded = []; // = false

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
        // return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id'); у него так
    }

}
