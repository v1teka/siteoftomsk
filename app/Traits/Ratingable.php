<?php
namespace App\Traits;
use App\Rating;
use Illuminate\Database\Eloquent\Model;

trait Ratingable
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }

    // Среднее значение оценок
    public function avgRating()
    {
        return $this->ratings()->avg('score');
    }

    // Сумма оценок
    public function sumRating()
    {
        return $this->ratings()->sum('score');
    }

    // Рейтинг в процентах
    public function ratingPercent($max = 5)
    {
        $quantity = $this->ratings()->count();
        $total = $this->sumRating();
        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 100) : 0;
    }

    // Оценивание
    public function rate($data, Model $author, Model $parent = null)
    {
        return (new Rating())->createUniqueRating($this, $data, $author);
    }

    public function getAvgRatingAttribute()
    {
        return round($this->avgRating(), 2);
    }
    public function getRatingPercentAttribute()
    {
        return $this->ratingPercent();
    }
    public function getSumRatingAttribute()
    {
        return $this->sumRating();
    }
}
