<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price', 'discount_price', 'description', 'img', 'product_cate_id'];
    //Tạo liên kết với bảng product_cate
    public function product_cate() : BelongsTo
    {
        //belongsTo để thiết lập quan hệ với bảng product_cate
        return $this->belongsTo(ProductCate::class, 'product_cate_id', 'id');
    }
    public $timestamps = true;
}
