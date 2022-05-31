<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRepresentative extends Model
{
    
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'joined_at',
        'sales_route_id',
        'sales_manager_id'
    ];

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
        return $this->hasOne(SalesRoute::class, 'id', 'sales_route_id');
    }

    /**
    * Get the latest comment for sales representative.
    */
    public function latestComment()
    {
        return $this->hasOne(SalesManagerComment::class)->latestOfMany();
    }

}
