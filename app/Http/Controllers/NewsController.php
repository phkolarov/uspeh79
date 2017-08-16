<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 6/3/2017
 * Time: 10:47 PM
 */

namespace app\Http\Controllers;


use App\Models\ArticleCategories;
use App\Models\Articles;
use Symfony\Component\HttpFoundation\Request;

class NewsController
{

    public function News(){
        $newsInformationCategory = ArticleCategories::where('name', 'Новини')->first();
        $newslist = Articles::where('type',$newsInformationCategory->id)->paginate(6);
        return view('pages.news', ['news' => $newslist]);
    }

    public function CurrentArticle(Request $request, $id){

        $currentArticle = Articles::find($id);

        if($currentArticle){
            return view('pages.article',['article'=>$currentArticle]);
        }else{
            return view('pages.not-found');
        }

    }
}