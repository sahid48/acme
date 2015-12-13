<?php
namespace Acme\models;
//use with database
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    //public $timestamps = false;
    //one user can have many testimonials
    public function testimonials()
    {
        return $this->hasMany('Acme\models\Testimonial');
    }
}

 ?>
