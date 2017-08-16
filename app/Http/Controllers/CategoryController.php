<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 19.5.2017 г.
 * Time: 20:41
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\App;
use App\Models\Category;

class CategoryController extends Controller
{

    public function categoryA(){
        $categoryInformation = Category::where('type','a')->first();
        return view('pages.category',['category'=> $categoryInformation]);
    }

    public function categoryA1(){

        $categoryInformation = Category::where('type','a1')->first();
        return view('pages.category',['category'=> $categoryInformation]);
    }

    public function categoryA2(){

        $categoryInformation = Category::where('type','a1')->first();
        return view('pages.category',['category'=> $categoryInformation]);
    }

    public function categoryB(){
        $categoryInformation = Category::where('type','b')->first();
        return view('pages.category',['category'=> $categoryInformation]);
    }


    public function categoryBE(){
        $categoryInformation = Category::where('type','b')->first();
        return view('pages.category',['category'=> $categoryInformation]);
    }

    public function categoryC(){
        $categoryInformation = Category::where('type','c')->first();
        return view('pages.category',['category'=> $categoryInformation]);

    }

    public function categoryD(){
        $categoryInformation = Category::where('type','d')->first();
        return view('pages.category',['category'=> $categoryInformation]);
    }

    public function categoryPro(){
        $categoryInformation = Category::where('type','pr')->first();
        return view('pages.category',['category'=> $categoryInformation]);
    }

    public function categoryADR(){
        $categoryInformation = Category::where('type','ad')->first();
        return view('pages.category',['category'=> $categoryInformation]);
    }

}