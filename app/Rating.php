<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = ['score', 'ratingable_id' , 'ratingable_type' , 'user_id', 'user_type'];

    public function rateable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function createUniqueRating(Model $ratingable, $data, User $user)
    {
        $rating = [
            'user_id' => $user->id,
            "ratingable_id" => $ratingable->id,
            "ratingable_type" => get_class($ratingable),
        ];
        Rating::updateOrCreate($rating, $data);
        return $rating;
    }
}
