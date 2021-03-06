<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public $directory = '/uploads/';

    use SoftDeletes;

    protected $date = ['deleted_at'];


/*
|------------------------------------
| MassAssignmentException
|------------------------------------
*/
    protected $fillable = ['title', 'content', 'path'];

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

        return $this->morphMany('App\Photo', 'imageable');

    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public static function scopeLatest($query) {
        return $query->orderBy('id', 'asc')->get();
    }

    public function getPathAttribute($value) {
        return $this->directory . $value;
    }
}
