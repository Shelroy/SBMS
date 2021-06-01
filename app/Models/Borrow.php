<?php

namespace App\Models;
use App\Http\Controllers\BooksController;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
//    protected $table ='borrows';
//    protected $primaryKey ='id';
    use HasFactory;
    public function student(){
        return $this->belongsTo(Student::class);

    }


    public function book(){
        return $this->belongsTo(Book::class);
    }
}
