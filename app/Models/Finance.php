<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = ['sub_category_id', 'member_id', 'amount', 'comment', 'created_at'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
