<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
//    protected $table ='books';
//    protected $primaryKey ='id';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function student(){
        //this is the correct relationship
        return $this->belongsTo(Student::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function borrow(){
        return $this->hasMany(Borrow::class);
    }
}
