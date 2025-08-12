<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_name',
        'language_id',
        'tag_id',
        'content',
    ];

    /**
     * Get the language this translation belongs to.
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Get the tag this translation belongs to.
     */
    public function tag()
    {
        return $this->belongsTo(TranslationTag::class, 'tag_id');
    }
}
