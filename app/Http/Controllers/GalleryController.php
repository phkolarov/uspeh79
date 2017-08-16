<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 21.5.2017 г.
 * Time: 13:39
 */

namespace App\Http\Controllers;


use App\Models\ImageCategory;
use App\Models\Images;

class GalleryController
{


    public function index(){

        $sysCategory = ImageCategory::where('type','sys')->first();

        $images = Images::whereNotIn('category',[$sysCategory->id])->orderBy('last_update','desc')->get();
        $categories = ImageCategory::get();
        return view('pages.gallery',['images'=>$images,'categories'=>$categories]);
    }

}