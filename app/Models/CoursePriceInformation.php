<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 24.5.2017 г.
 * Time: 17:03
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CoursePriceInformation extends Model
{

    protected $table = 'courses_price_information';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

}