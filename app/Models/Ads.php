<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\Advertiser;

class Ads extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'title',
        'description',
        'category_id',
        'advertiser_id',
        'start_date',
    ];

    /**
     * Get the advertiser that owns the Ads
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser(): BelongsTo
    {
        return $this->belongsTo(Advertiser::class, 'advertiser_id', 'id');
    }

    /**
     * Get all of the tags for the Ads
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
       return $this->hasOne(Category::class,'id',"category_id");
    }

    /**
     * Get all of the tags for the Ads
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(AdsTag::class, 'ads_id', 'id')->with('tag');
    }
}
