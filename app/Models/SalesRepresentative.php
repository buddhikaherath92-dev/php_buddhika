<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRepresentative extends Model
{
    
    use HasFactory;

    /**
     * Get the sales manager that manage the sales representative.
     */
    public function salesManager()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the comments for the sales representative.
     */
    public function comments()
    {
        return $this->hasMany(SalesManagerComment::class);
    }

     /**
     * Get the sales route associated with the sales representative.
     */
    public function salesRoute()
    {
        return $this->hasOne(SalesRoute::class);
    }

}
