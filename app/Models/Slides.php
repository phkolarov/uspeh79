<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 17/06/10
 * Time: 16:23
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    protected $table = 'slides';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
}