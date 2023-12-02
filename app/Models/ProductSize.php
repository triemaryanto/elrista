<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class ProductSize extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;
    use SoftDeletes;

    protected $guarded = [];
}
