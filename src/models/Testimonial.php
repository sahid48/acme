<?php
namespace Acme\models;
//use with database
use Illuminate\Database\Eloquent\Model as Eloquent;

class Testimonial extends Eloquent
{
    //public $timestamps = false;
    //one Testimonial has only one user
    public function user()
    {
        return $this->hasOne('acme\models\User');
    }
}

 ?>
