<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;
use GuzzleHttp\Client;
use Session;
use Config;
use Cookie;
use App\Helpers\Helper;

class LinkedinController extends Controller
{
    public $RedirectURI;
    public $Client_ID;
    public $Client_Secret;
    public $config_file;


    public function __construct(){
        $this->RedirectURI = config::get('app.linkedin_redirect_url');
        $this->Client_ID = config::get('app.linkedin_client_id');
        $this->Client_Secret =  config::get('app.linkedin_secret_id');
        $this->config_file = 'token.json'; //config::get('app.');

    }



    public function linkedinCallback(Request $request)
    {
        // dd($request->input('code'));

        try {
            $re = Helper::getAccessToken($this->RedirectURI, $this->Client_ID, $this->Client_Secret, $request->input('code'));

            $re = json_decode($re, true);

            $user = Helper::getuserinfo($re['access_token']);

            if($user){
                Session::put('token',$re['access_token']);
                Session::put('sub',$user['sub']);
				Cookie::queue('lkd', '1', 1000);
                return redirect('/chirps');
            }else{
                return redirect('/login');
            }


        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }

    public function postonlinkedin(Request $request)
    {
        $access_token = Session::get('token');

        $subid = Session::get('sub');

        $content = $request->input('message');

        $response = Helper::post_linkedin($access_token, $subid, $content);
        //if($response){
            echo '<script>alert("post successfully")</script>';
            return redirect('/chirps');
        //}else{
           //  echo '<script>alert("post successfully")</script>';
           // return redirect('/chirps');
        //}
    }

    public function getAllPosts()
    {
        $access_token = Session::get('token');
        // dd($access_token);
        $subid = Session::get('sub');
        $response = Helper::getAllPosts($access_token, $subid);
        dd($response);
    }
}
