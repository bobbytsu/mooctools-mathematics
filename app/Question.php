<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'QuestionLevel', 'Question', 'Answer', 'UpdatedByID', 'UpdatedByName',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
