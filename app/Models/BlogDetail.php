<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class BlogDetail extends Model implements TranslatableContract
{
    use HasFactory, Translatable;


    protected $fillable = ['blog_id', 'image'];

    public $translatedAttributes = ['title', 'description'];


    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
