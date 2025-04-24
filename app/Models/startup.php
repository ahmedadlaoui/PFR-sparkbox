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
        'details',
        'category',
        'website',
        'logo',
        'cover',
        'funding_goal',
        'valuation',
        'monthly_revenue',
        'gross_margin',
        'burn_rate',
        'runway',
        'user_id',
    ];
    

    /**
     * One-to-one relationship with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function offers()
{
    return $this->hasMany(Offer::class);
}

}
