<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImageProducts extends Model
{
    use HasFactory;
    protected $table = "image_product";

    protected $fillable = [
        'id_kind_background',
        'URL'
    ];

    public function kindProductType(){
        
        return $this->belongsTo(KindProductType::class,'id_kind_background','id');
    }
}
