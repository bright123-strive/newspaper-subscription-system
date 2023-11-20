<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;


    protected $table = 'subscriptions';

    protected $primaryKey = 'id';

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'publication_id',
        'location',
        'region',
        'start_date',
        'end_date',
        "duration",
        "copies",
        "total_price",
    ];

    public function publications()
    {
        return $this->belongsToMany(Publication::class)->withPivot('copies'," 'total_price'");
    }

    public function user(){

        return $this->hasMany(User::class);

    }
}
