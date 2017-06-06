<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];


/*
|------------------------------------
| MassAssignmentException
|------------------------------------
*/
    protected $fillable = [
        'title',
        'content',
    ];

/*
|------------------------------------
| class name does not match with table name
| for example, class AdminPost defaults to table adminposts
|------------------------------------
*/
//    protected $table = 'posts';

/*
|------------------------------------
| by default primary key defaults to 'id'
| change primary key name with protected
|------------------------------------
*/
//    protected $primaryKey = 'post_id';

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function photos(){

        return $this->morphMany('App\Photo', 'imagetable');

    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
