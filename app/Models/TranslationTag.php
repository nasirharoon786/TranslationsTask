<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslationTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the translations associated with this tag.
     */
    public function translations()
    {
        return $this->hasMany(Translation::class, 'tag_id');
    }
}
