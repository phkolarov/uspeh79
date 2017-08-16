<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 24.5.2017 г.
 * Time: 18:18
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    public function getCategory(){
        return $this->belongsTo(  'App\Models\ArticleCategories','type','id');
    }
}