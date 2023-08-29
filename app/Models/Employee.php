<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    //for mass assignment
    protected $fillable=['name','email','joining_date','salary','is_active'];

    // //to remove certail columns to save
    // protected $guarded['email']
    // //use [] to save all columns
    protected $table = 'employee';
}

?>