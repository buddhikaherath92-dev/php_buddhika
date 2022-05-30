<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesManagerComment extends Model
{
    use HasFactory;

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
