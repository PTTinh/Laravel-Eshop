<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCate extends Model
{
    use HasFactory;
    protected $table = 'product_cates';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public $timestamps = true;
}
