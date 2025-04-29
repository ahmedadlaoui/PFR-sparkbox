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


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    /**
     * Get the logo URL
     * 
     * @return string|null
     */
    public function getLogoAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // If the value starts with http or https, it's a URL (legacy data)
        if (filter_var($value, FILTER_VALIDATE_URL) || strpos($value, 'http') === 0) {
            return $value;
        }

        // Otherwise, it's a path to a file in storage, construct URL properly
        return asset('storage/' . $value);
    }

    /**
     * Get the cover image URL
     * 
     * @return string|null
     */
    public function getCoverAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // If the value starts with http or https, it's a URL (legacy data)
        if (filter_var($value, FILTER_VALIDATE_URL) || strpos($value, 'http') === 0) {
            return $value;
        }

        // Otherwise, it's a path to a file in storage, construct URL properly
        return asset('storage/' . $value);
    }
}
