<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillRankChange extends Model {

    protected $fillable = [ 'from_sr', 'to_sr', 'role' ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
