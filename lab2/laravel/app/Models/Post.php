<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function someTest()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
