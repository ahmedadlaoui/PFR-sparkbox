<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'valuation',
        'website',
        'funding_goal',
        'user_id',
    ];

    /**
     * One-to-one relationship with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
