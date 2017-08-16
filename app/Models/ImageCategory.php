<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 21.5.2017 г.
 * Time: 14:40
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{

    protected $table = 'images_categories';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    public function Image()
    {
        return $this->belongsTo('App\Models\Images');
    }
}