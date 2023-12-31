<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Product extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;
    use SoftDeletes;

    use Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function listImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function listSize()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

    public function gambar_satu()
    {
        return $this->hasOne(ProductImage::class, 'product_id');
    }
}
