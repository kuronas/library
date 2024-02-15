<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    
    protected $table = 'buku';
    protected $fillable = [
        'judul','cover','slug','penulis','penerbit','tahunterbit'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    /**
     * The roles that belong to the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(Kategoribuku::class, 'kategoribuku_relasi', 'buku_id', 'kategoribuku_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }
    
    public function averageRating()
{
    return $this->ulasan()->average('rating');
}
}
