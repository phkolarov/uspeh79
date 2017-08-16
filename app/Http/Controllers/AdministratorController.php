<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategories;
use App\Models\Articles;
use App\Models\Category;
use App\Models\CourseInformation;
use App\Models\CoursePriceInformation;
use App\Models\ImageCategory;
use App\Models\Images;
use App\Models\Slides;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;


class AdministratorController extends Controller
{

    /**
     * AdministratorController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {

        return view('pages.administrator.welcome');
    }

    public function changeArticle()
    {
        $categories = ArticleCategories::all();
        $articles = Articles::orderBy('type', 'asc')->paginate(9);
        return view('pages.administrator.change-article', ['articles' => $articles, 'categories' => $categories, 'filter' => 'all']);
    }

    public function changeCurrentArticle(Request $request, $id)
    {
        $article = new Articles();
        $imageUpload = true;
        $articleId = 'new';
        if ($id != 'new') {
            $article = Articles::find($id);
            $type = $article->getCategory()->orderBy('id')->get()->first()->name;
            $articleId = $article->id;

            $newsType = false;
            if ($type == 'Новини') {
                $imageUpload = true;
                $newsType = true;
            } else {
                $imageUpload = false;
            }
        }

        return view('pages.administrator.change-current-article', ['article' => $article, 'articleId' => $articleId, 'imageUpload' => $imageUpload, 'id' => $id,'news'=>$newsType]);
    }

    public function changeArticleFilter(Request $request, $filter)
    {
        if ($filter == 'all') {
            return redirect()->route('change-article');
        }

        $categories = ArticleCategories::all();
        $articlesCategory = ArticleCategories::where('name', $filter)->first();
        $articles = Articles::where('type', $articlesCategory->id)->orderByDesc('creation_date')->paginate(9);

        $collection = [];

        if(count($articles)){
//            $articlesCollectionOrdered = $articles->sortByDesc(function ($post) {
//                return $post->creation_date;
//            });

            //$collection = $this->paginateCollection($articles, 9);
        }


        return view('pages.administrator.change-article', ['articles' => $articles, 'categories' => $categories, 'filter' => $filter]);
    }

    public function saveCurrentArticle(Request $request, $id)
    {

        if ($id == 'new') {

            $article = new Articles();
            $article->title = $request->get('title');
            $article->content = $request->get('article-value');
            $articleCategory = ArticleCategories::Where('name', 'Новини')->first();

            $article->type = $articleCategory->id;
            $file = $request->file('image_thumbnail');

            if ($request->hasFile('image_thumbnail')) {
                $imageName = uniqid() . '.jpg';
                $path = $file->storeAs('articles/', '' . $imageName, 'custom');
                $article->article_image = $imageName;
            } else {
                return redirect()->route('change-current-article', ['id' => 'new']);
            }

            $article->save();
            return redirect()->route('change-article');

        } else {
            $article = Articles::find($id);
            $article->content = $request->get('article-value');
            $file = $request->file('image_thumbnail');

            if ($request->hasFile('image_thumbnail')) {
                $imageName = uniqid() . '.jpg';
                $path = $file->storeAs('articles/', '' . $imageName, 'custom');
                $article->article_image = $imageName;
            }

            $article->save();
            return redirect()->route('change-current-article', ['id' => $id]);
        }
    }

    public function changePrices()
    {
        $prices = CoursePriceInformation::all();
        return view('pages.administrator.change-prices', ['prices' => $prices]);
    }

    public function changeCurrentPrice(Request $request, $id)
    {
        $currentPriceInformation = CoursePriceInformation::find($id);
        return view('pages.administrator.change-current-price-information', ['priceInformation' => $currentPriceInformation]);
    }

    public function saveCurrentPrice(Request $request, $id)
    {

        $currentPriceInformation = CoursePriceInformation::find($id);
        $currentPriceInformation->vehicle = $request->get('vehicle');
        $currentPriceInformation->requirements = $request->get('requirements');
        $currentPriceInformation->documents = $request->get('documents');
        $currentPriceInformation->new_price = $request->get('new_price');
        $currentPriceInformation->hours = $request->get('hours');
        $currentPriceInformation->promotion = $request->get('promotion');

        $file = $request->file('icon_uri');
        if ($request->hasFile('icon_uri')) {
            $imageName = uniqid() . '.jpg';
            $path = $file->storeAs('price-images/', $imageName, 'custom');
            $currentPriceInformation->icon_uri = $imageName;
        }

        $currentPriceInformation->vehicle = $request->get('vehicle');
        $currentPriceInformation->save();

        return redirect()->route('change-prices');
    }


    public function slider()
    {

        $slides = Slides::all();
        $files = array_diff(scandir('../public/img/slider'), ['..', '.']);
        return view('pages.administrator.slider', ['slides' => $slides, 'files' => $files]);
    }

    public function sliderImageUpload(Request $request)
    {

        $file = $request->file('new-image');

        if ($request->hasFile('new-image')) {
            $imageName = uniqid() . '.jpg';
            $path = $file->storeAs('slider/', $file->getClientOriginalName(), 'custom');
        }

        return redirect()->route('slider');
    }


    public function deleteImage(Request $request, $name)
    {

        $filePath = 'img/slider/' . $name;
        $slide = Slides::where('slide', $name)->first();

        if (file_exists($filePath) && is_null($slide)) {
            unlink($filePath);
        } else {
            return redirect()->route('slider', ['error' => 'Трябва да премахнете изображението от слайдъра']);
        }
        return redirect()->route('slider');
    }

    public function loadToSlider(Request $request, $name)
    {
        $slide = Slides::where('slide', $name)->first();

        if (is_null($slide)) {
            $slide = new Slides();
            $slide->slide = $name;
            $slide->save();
        } else {
            return redirect()->route('slider', ['error' => 'Този слайд e вече добавен']);
        }

        return redirect()->route('slider', ['success' => 'Успешно добавен слайд']);
    }

    public function removeSlide(Request $request, $id)
    {
        $slide = Slides::find($id);

        if (!is_null($slide)) {
            $slide->delete();
        } else {
            return redirect()->route('slider', ['error' => 'Този слайд e вече добавен']);
        }
        return redirect()->route('slider', ['success' => 'Успешно изтрит слайд']);
    }

    public function gallery(Request $request)
    {
        $images = [];
        $images = Images::OrderBy('creation_date', 'desc')->get()->all();
        $categories = ImageCategory::OrderBy('creation_date', 'desc')->get()->all();
        $filter = 'all';
        return view('pages.administrator.gallery', ['images' => $images, 'categories' => $categories, 'filter' => $filter]);
    }

    public function galleryFilter(Request $request, $filter)
    {
        $images = [];
        $categories = ImageCategory::OrderBy('creation_date', 'desc')->get()->all();

        if ($filter != 'all') {
            $filterCategory = ImageCategory::Where('name', $filter)->get()->first();
            $images = Images::Where('category', $filterCategory->id)->orderBy('creation_date', 'desc')->get()->all();
        } else {
            return redirect()->route('gallery-administration');
        }
        return view('pages.administrator.gallery', ['images' => $images, 'categories' => $categories, 'filter' => $filter]);
    }

    public function deleteImageGallery(Request $request, $id)
    {
        $slide = Images::find($id);
        if ($slide) {
            $this->storeImagePaths();
            $slide->delete();
        } else {
            return redirect()->route('gallery-administration', ['error' => 'Несъществуваща снимка']);
        }

        $categoryName = ImageCategory::find($slide->category)->name;
        $this->storeImagePaths();

        return redirect()->route('gallery-filter', [$categoryName, 'success' => 'Успешно добавена снимка']);

    }


    public function uploadGalleryImage(Request $request)
    {
        $file = $request->file('new-image');
        $categoryName = $request->get('category-name');
        $category = ImageCategory::Where(['name' => $categoryName])->first();

        if ($request->hasFile('new-image') && $category) {

            $path = $file->storeAs('gallery/', $file->getClientOriginalName(), 'custom');
            $galleryImage = new Images();
            $galleryImage->name = $file->getClientOriginalName();
            $galleryImage->uri = $file->getClientOriginalName();
            $galleryImage->category = $category->id;
            $galleryImage->save();
            $this->storeImagePaths();
        } else {
            return redirect()->route('gallery-administration', ['error' => 'Невалидни параметри']);
        }
         return redirect()->route('gallery-filter', [$categoryName, 'success' => 'Успешно добавена снимка']);
    }


    function paginateCollection($collection, $perPage, $pageName = 'page', $fragment = null)
    {
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage($pageName);
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage);
        parse_str(request()->getQueryString(), $query);
        unset($query[$pageName]);
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            [
                'pageName' => $pageName,
                'path' => \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPath(),
                'query' => $query,
                'fragment' => $fragment
            ]
        );

        return $paginator;
    }


    function courseInformation()
    {
        $articles = CourseInformation::orderBy('type', 'asc')->get()->all();
        return view('pages.administrator.course-information', ['articles' => $articles]);
    }

    function changeCourseInformation(Request $request, $id)
    {

        $courseInformation = CourseInformation::find($id);
        $images = Images::all();

        $outputObject = [];

        foreach ($images as $image) {

            $imageUri = $image->uri;
            $outputObject[] = [
                "image" => "img/gallery/".$imageUri,
                "thumb" => "img/gallery/".$imageUri,
                "folder" => "color"
            ];
        }

        return view('pages.administrator.change-course-information', ['courseInformation' => $courseInformation, 'images' => json_encode($outputObject,JSON_UNESCAPED_UNICODE)]);
    }

    function saveCourseInformation(Request $request, $id){

        $courseInformation = CourseInformation::find($id);

        $newContent = $request->get('course-info-value');
        $courseInformation->content = $newContent;
        $courseInformation->save();
        return redirect()->route('change-course-information',[$id, 'success'=>'Успешно обновена информация']);
    }

    function deleteArticle(Request $request, $id){
        $article = Articles::destroy($id);
        return redirect()->route('change-article',['success'=> 'Успешно изтрита статия']);
    }


    private function storeImagePaths(){
        $imageDir = 'img/gallery';
        $files = array_diff( scandir($imageDir),['.','..']);
        $jsonObject = [];

        $basePath = "http://" . $_SERVER['SERVER_NAME'] .'/public/img/gallery/';
        foreach ($files as $key=>$f){

            $jsonObject[] = [
                'image'=>$basePath.$f,
                'thumb'=>$basePath.$f,
                "folder"=> "Small"
            ];
        }

        file_put_contents('images.json',json_encode($jsonObject,JSON_UNESCAPED_UNICODE));
    }
}