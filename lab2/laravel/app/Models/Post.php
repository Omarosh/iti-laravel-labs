<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'desc',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();;
    }

    // public function someTest()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
