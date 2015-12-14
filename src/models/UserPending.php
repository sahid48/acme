<?php
namespace Acme\Models;
//use with database
use Illuminate\Database\Eloquent\Model as Eloquent;

class UserPending extends Eloquent
{
    //now model are looking UsersPendings

    // so we force the model dont look table name users_pendings

    
    //overwrite table name
    protected $table = 'users_pending';
}

 ?>
