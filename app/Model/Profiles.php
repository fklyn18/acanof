<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * @description return all created profiles
     * @param $query
     * @return mixed
     */
    public function scopeGetAllProfiles($query){
        return $query->where('iduser', '>', 0);
    }

    public function scopeGetProfile($query, $id){
        return $query->where('iduser', '=', $id);
    }
}
