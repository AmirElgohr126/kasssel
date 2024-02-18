<?php

namespace App\Models;

use App\Models\BlogDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Blog extends Model implements TranslatableContract
{
    use HasFactory ,Translatable;
    protected $fillable = ['image'];

    public $translatedAttributes = ['title', 'description', 'categories'];

    public function details()
    {
        return $this->hasMany(BlogDetail::class);
    }
}
