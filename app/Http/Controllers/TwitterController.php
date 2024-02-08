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

class TwitterController extends Controller
{
    public $RedirectURI;
    public $Client_ID;
    public $Client_Secret;
    public $config_file;


    public function __construct(){
        $this->RedirectURI = config::get('app.twitter_redirection_url');
        $this->Client_ID = config::get('app.twitter_client_id');
        $this->Client_Secret =  config::get('app.twitter_secret_id');
        $this->config_file = 'token.json'; //config::get('app.');

    }

    public function twitterCallback(Request $request)
    {

        try {
            $re = Helper::getTwitterAccessToken($this->RedirectURI, $this->Client_ID, $this->Client_Secret, $request->input('code'));
            $re = json_decode($re, true);
            Session::put('refresh_token',$re['refresh_token']);
            Session::put('access_token',$re['access_token']);
			Cookie::queue('twr', '1', 1000);
            return redirect('/chirps');

        } catch (Exception $e) {
            dd($e->getMessage());
        }


    }

    public function getrefreshToken()
    {

        $refresh_token = Helper::getrefreshToken(Session::get('refresh_token'), $this->Client_ID);
        if(Session::get('refresh_token') === $refresh_token['refresh_token'] && Session::get('access_token') === $refresh_token['access_token']){
        }else{
            Session::put('refresh_token',$refresh_token['refresh_token']);
            Session::put('access_token',$refresh_token['access_token']);
        }

    }


    public function postOnTwitter(Request $request)
    {
        $request->input('message');
        $post = Helper::post_twitter(Session::get('access_token'),$request);
        if($post){
           echo '<script>alert("twitter Post Added Successfully")</script>';
        }else{
            echo '<script>alert("twitter Post Added Successfully")</script>';
        }
    }

    public function getme()
    {
        dd(Session::get('access_token'));
        $me = Helper::gettuser(Session::get('access_token'));
        dd($me);
    }


}
