<?php
/**
 * Created by PhpStorm.
 * User: mst
 * Date: 27.5.2017 г.
 * Time: 14:22
 */

namespace App\Http\Controllers;

use App\Models\ArticleCategories;
use App\Models\Articles;
use App\Models\CoursePriceInformation;
use App\Models\Slides;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    const SECRET_RECAPTCHA_KEY = "6LfxdhAUAAAAAOSojCebrC5Bx2f9u_x_X8DU3BAN";
    const  RECAPTHCA_VALIDATION_URI = "https://www.google.com/recaptcha/api/siteverify";

    public function homepage()
    {

        $newsInformationCategory = ArticleCategories::where('name', 'Новини')->first();
        $latestnews = Articles::where('type', $newsInformationCategory->id)->orderBy('creation_date', 'desc')->take(3)->get();

        $aCategory = CoursePriceInformation::where('type', 'a')->first();
        $bCategory = CoursePriceInformation::where('type', 'b')->first();
        $cCategory = CoursePriceInformation::where('type', 'c')->first();
        $dCategory = CoursePriceInformation::where('type', 'd')->first();

        return view('welcome', ['latest_news' => $latestnews, 'aCategory'=> $aCategory, 'bCategory'=> $bCategory, 'cCategory'=> $cCategory, 'dCategory'=> $dCategory, ]);
    }

    public function AboutUs()
    {

        $aboutUsInformationCategory = ArticleCategories::has('Articles')->where('name', 'За нас')->first();
        $priceInformation = $aboutUsInformationCategory->articles->where('title', 'За нас')->first();
        return view('pages.about-us', ['about_us' => $priceInformation]);
    }


    public function Contacts()
    {
        $contactsInformationCategory = ArticleCategories::has('Articles')->where('name', 'Контакти')->first();
        $contactsInformation = $contactsInformationCategory->articles->where('title', 'Контакти')->first();
        return view('pages.contacts', ['contacts' => $contactsInformation]);
    }


    public function SendEmail(Request $request)
    {
        ini_set('max_execution_time', 300);
        $name =     $request->input('fullname');
        $email =    $request->input('email');
        $phone =    $request->input('phone');
        $question = $request->input('question');
        $category = $request->input('category');
        $recaptcha_response = $request->input('g-recaptcha-response');
        $requestedMails = array("uspeh79.office@gmail.com", "psretenov@abv.bg");

        $validation = $this->sendPOSTRequest(self::RECAPTHCA_VALIDATION_URI, [
            'secret' => self::SECRET_RECAPTCHA_KEY,
            'response' => $recaptcha_response,
        ]);

        if ($validation->success && !is_null($name)&& is_numeric($phone) && !is_null($question) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

           foreach($requestedMails as $mail){			   			    $data = [                'name' =>    htmlentities($name),                'phone' =>   htmlentities( $phone),                'email' =>    htmlentities($email),                'question' => htmlentities($question),                'requestedMail'=>$mail            ];           if(!isset($category)){               \Mail::send('emails.mail', ['name' => $data['name'], 'phone' => $data['phone'], 'email' => $data['email'], 'question' => $data['question']], function ($message) use ($data) {                   $message->from($data['email'], $data['name']);				   $message->subject('ЗАПИТВАНЕ');                   $message->to($data['requestedMail']);               });           }else{               \Mail::send('emails.candidate', ['name' => $data['name'],'category' =>$category, 'phone' => $data['phone'], 'email' => $data['email'], 'question' => $data['question']], function ($message) use ($data) {                   $message->from($data['email'], $data['name']);                   $message->subject('КАНДИДАТУРА');                   $message->to($data['requestedMail']);               });				}		   }

            return response()->json(['success'=> ['message'=> 'Успешно изпратено запитване!']]);
        } else {
            return response()->json(['error'=> ['message'=> 'Неуспешно изпратено запитване! Моля въведете коректно полетата.']]);
        }
    }

    public
    function none()
    {
        return redirect('/');
    }

    public
    static function Slides()
    {
        $slides = Slides::all();
        return $slides;
    }


    public
    static function getBaseInfo()
    {

        $jsonInfo = file_get_contents('../config/base-information.json');
        $information = json_decode($jsonInfo);
        return $information;
    }

    private
    function sendPOSTRequest($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        return json_decode($server_output);
    }
}