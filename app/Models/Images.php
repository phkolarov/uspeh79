<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 19.5.2017 г.
 * Time: 21:06
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    public function getCategory(){
        return $this->hasOne('App\Models\ImageCategory','id','category');
    }
}