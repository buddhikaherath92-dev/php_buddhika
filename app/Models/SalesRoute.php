<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesRoute extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'route'
    ];

    /**
     * Get the sales manager that manage the sales representative.
     */
    public function salesRepresentative()
    {
        return $this->belongsToMany(SalesRepresentative::class);
    }

}
