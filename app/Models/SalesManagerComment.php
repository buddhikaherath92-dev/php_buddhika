<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesManagerComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
        'commentor_id',
        'sales_representative_id'
    ];

    /**
     * Get the sales representative that owns the comment.
     */
    public function salesRepresentative()
    {
        return $this->SalesRepresentative(Post::class);
    }

    /**
     * Get the sales manager who made the comment
     */
    public function commentor()
    {
        return $this->morphTo();
    }

}
