<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 24.5.2017 г.
 * Time: 18:19
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ArticleCategories extends Model
{
    protected $table = 'article_categories';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';


    function articles() {
        return $this->hasMany('App\Models\Articles', 'type');
    }
}