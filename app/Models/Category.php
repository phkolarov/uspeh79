<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 19.5.2017 г.
 * Time: 21:06
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'course_information';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';


}