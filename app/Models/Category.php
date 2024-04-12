<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function posts()   
    {
        // Postに対するリレーション
        return $this->hasMany(Post::class);  
        //「1対多」の関係なので'posts'と複数形に
    }
    
    public function getByCategory(int $limit_count = 5)
    {
         return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
         //自身に属する投稿を取得する処理
    }
}
