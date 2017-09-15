<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'access_forum',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function rating(Model $ratingable)
    {
        $rating = $this->ratings()->where('ratingable_id', $ratingable->id)->where('ratingable_type', get_class($ratingable));
        return $rating->count() > 0 ? $rating->first()->score : null;
    }

    public function getFullNameAttribute()
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->surname);
    }

    public function hasRole($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }
        return false;
    }

    public function rolesToStr($separator)
    {
        return implode($separator, $this->roles()->pluck('name')->toArray());
    }

    public function isModerator()
    {
        return $this->hasRole('Модератор');
    }

    public function isAdmin()
    {
        return $this->hasRole('Администратор');
    }

}
