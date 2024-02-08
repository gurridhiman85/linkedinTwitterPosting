<?php
namespace App\Helpers;

class Helper{

    public static function getAccessToken($redirectURI, $clientId, $clientSecret, $code)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.linkedin.com/oauth/v2/accessToken',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type=authorization_code&code='.$code.'&client_id='.$clientId.'&client_secret='.$clientSecret.'&redirect_uri='.$redirectURI,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: bcookie="v=2&9ff0ad92-9f7f-4f89-8642-22f98ec092f2"; lang=v=2&lang=en-us; lidc="b=OB12:s=O:r=O:a=O:p=O:g=4715:u=1036:x=1:i=1704965718:t=1705014362:v=2:sig=AQH4A_heylx2az2Szs8nwN3jdHVHbz7U"; JSESSIONID=ajax:6109226793028673148; PLAY_SESSION=eyJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImZsb3dUcmFja2luZ0lkIjoia0JWSVROeHhRKzYxdzVZMkFFZWlGdz09In0sIm5iZiI6MTcwNDk2NDk0MCwiaWF0IjoxNzA0OTY0OTQwfQ.zN5Z7MRU-VD1bFKAc1cf44r4gzdrM1mT5cll2cHNkUI; bscookie="v=1&202401050638572d21cefc-18da-40a5-8a62-f689ee97cde9AQGd8xMXuPakztCZGiQNc6ySzsUdc1Wp"'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        return $response;
    }

    public static function getuserinfo($token){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.linkedin.com/v2/userinfo',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$token,
                'Cookie: lidc="b=OB12:s=O:r=O:a=O:p=O:g=4715:u=1036:x=1:i=1704959291:t=1705014362:v=2:sig=AQE1dkF9AZ8xED4SR8NH-Wsy3KcH-Zpc"; bcookie="v=2&9ff0ad92-9f7f-4f89-8642-22f98ec092f2"; lang=v=2&lang=en-us; lidc="b=OB12:s=O:r=O:a=O:p=O:g=4715:u=1036:x=1:i=1704959276:t=1705014362:v=2:sig=AQEfzlrLZEpbLKtmB_GtQdqF9ap7OThI"'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        return json_decode($response, true);
    }

    public static function post_linkedin($token, $user_id, $post_content){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.linkedin.com/v2/ugcPosts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "author": "urn:li:person:'.$user_id.'",
                "lifecycleState": "PUBLISHED",
                "specificContent": {
                    "com.linkedin.ugc.ShareContent": {
                        "shareCommentary": {
                            "text": "'.$post_content.'"
                        },
                        "shareMediaCategory": "NONE"
                    }
                },
                "visibility": {
                    "com.linkedin.ugc.MemberNetworkVisibility": "PUBLIC"
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: text/plain',
                'Authorization: Bearer '.$token,
                'Cookie: lidc="b=OB12:s=O:r=O:a=O:p=O:g=4715:u=1036:x=1:i=1704959335:t=1705014362:v=2:sig=AQHP4_uN2RVIrK_pZK4_KJyf22IGYX2h"; bcookie="v=2&9ff0ad92-9f7f-4f89-8642-22f98ec092f2"; lang=v=2&lang=en-us; lidc="b=OB12:s=O:r=O:a=O:p=O:g=4715:u=1036:x=1:i=1704959276:t=1705014362:v=2:sig=AQEfzlrLZEpbLKtmB_GtQdqF9ap7OThI"'
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        curl_close($curl);

        return $response;

    }

    public static function getAllPosts($token, $user_id){
        // dd($token);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $url="https://api.linkedin.com/v2/shares?q=owners&owners=urn:li:person:".$user_id;
        $headers[] = 'X-HTTP-Method-Override: BATCH_GET';
        $headers[] = 'X-Restli-Protocol-Version: 2.0.0';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Authorization: Bearer ' .$token;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 20);
        $result = curl_exec($curl);
        curl_close($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        $result = json_decode($result,true);
        dd($result);
    }
    // Twitter functionality start here
    public static function getTwitterAccessToken($redirectURI, $clientId, $clientSecret, $code)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitter.com/2/oauth2/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'grant_type=authorization_code&code='.$code.'&client_id='.$clientId.'&client_secret='.$clientSecret.'&redirect_uri='.$redirectURI.'&code_verifier=challenge',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: bcookie="v=2&9ff0ad92-9f7f-4f89-8642-22f98ec092f2"; lang=v=2&lang=en-us; lidc="b=OB12:s=O:r=O:a=O:p=O:g=4715:u=1036:x=1:i=1704965718:t=1705014362:v=2:sig=AQH4A_heylx2az2Szs8nwN3jdHVHbz7U"; JSESSIONID=ajax:6109226793028673148; PLAY_SESSION=eyJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImZsb3dUcmFja2luZ0lkIjoia0JWSVROeHhRKzYxdzVZMkFFZWlGdz09In0sIm5iZiI6MTcwNDk2NDk0MCwiaWF0IjoxNzA0OTY0OTQwfQ.zN5Z7MRU-VD1bFKAc1cf44r4gzdrM1mT5cll2cHNkUI; bscookie="v=1&202401050638572d21cefc-18da-40a5-8a62-f689ee97cde9AQGd8xMXuPakztCZGiQNc6ySzsUdc1Wp"'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        return $response;
    }



    public static function getrefreshToken($token,$clientId){
        // dd($token);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.twitter.com/2/oauth2/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
             CURLOPT_POSTFIELDS => 'refresh_token='.$token.'&grant_type=refresh_token&client_id='.$clientId,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        return json_decode($response, true);
    }

    public static function post_twitter($ttoken,$message)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.twitter.com/2/tweets',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "text": "'.$message.'"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$ttoken,
            'Cookie: guest_id=v1%3A170503411246277746; guest_id_ads=v1%3A170503411246277746; guest_id_marketing=v1%3A170503411246277746; personalization_id="v1_RwxAyFvhzPYFFfaP/gz3Tg=="'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        echo $response;
    }

    public static function gettuser($token)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.twitter.com/2/me',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token,
        ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        curl_close($curl);
        dd($response);
    }
}
