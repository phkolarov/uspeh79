<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 24.5.2017 г.
 * Time: 16:40
 */

namespace App\Http\Controllers;


use App\Models\ArticleCategories;
use App\Models\Articles;
use App\Models\CoursePriceInformation;

class PriceController extends Controller
{

    public function CoursesPrice(){

        $regularCourses = CoursePriceInformation::where('special',0)->orderBy('id','asc')->get()->all();
        $priceInformationWObject = ArticleCategories::has('Articles')->where('name','Цени')->first();
        $priceInformation = $priceInformationWObject->articles->where('title','Курсове за водачи')->first();

        return view('pages.prices',['regularCourse'=>$regularCourses,'priceInformation'=>$priceInformation]);
    }

    public function QualifiedCoursesPrice(){
        $regularCourses = CoursePriceInformation::where('special',1)->orderBy('id','asc')->get()->all();
        $priceInformationWObject = ArticleCategories::has('Articles')->where('name','Квалификационни')->first();
        $priceInformation = $priceInformationWObject->articles->where('title','Квалификационни курсове')->first();

        return view('pages.prices',['regularCourse'=>$regularCourses,'priceInformation'=>$priceInformation]);
    }
}