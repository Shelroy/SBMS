<?php

namespace App\Models;

use App\Http\Controllers\BooksController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SearchController;


class Student extends Model
{
    //table  name

    use HasFactory;

    protected $table ='students';
    protected $primaryKey ='id';
// this is forming the relationship between the students table and the users table

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function books(){
        // this is the correct relationship
        return $this->hasMany(Book::class);
    }

    public function borrow(){
        return $this->hasMany(Borrow::class);
    }

    public function guardian(){
        return $this->belongsTo(Guardian::class);
    }


}
