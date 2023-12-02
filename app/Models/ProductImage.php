<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class ProductImage extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;
    use SoftDeletes;

    protected $guarded = [];

    public function listColor(){
        return $this->hasMany(ProductImageColor::class, 'product_image_id');
    }
}
