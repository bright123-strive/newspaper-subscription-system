<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
    ];

    public function subscriptions()
{
    return $this->belongsToMany(Subscription::class)->withPivot('copies', 'total_price');
}
}
