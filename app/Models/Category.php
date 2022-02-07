<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['category_name'];

    public function relationToUser()
    {
      return $this->belongsTo(User::class, 'added_by' ,'id');
    }
    
}
