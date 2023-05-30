<?php

namespace controllers\SocialMedia\Auth;

use core\Controller;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');



use Abraham\TwitterOAuth\TwitterOAuth;
use Exception;
use core\Request;
use models\SocialNetworkAuthentication;


class TwitterTokenController extends Controller
{
    protected $request;

    function __construct()
    {
        $this->request = new Request();
    }

    public function index()
    {

        $apiKey     =  $_ENV['TWITTER_API_KEY'];
        $apiSecret  =  $_ENV['TWITTER_API_SECRET'];


        $twitterClient = new TwitterOAuth($apiKey, $apiSecret);
        $twitterClient->setTimeouts(30, 30);
        try {
            $requestToken = $twitterClient->oauth('oauth/request_token', ['oauth_callback' => $_ENV['TWTTER_CALLBACK_URL']]);

            responseJson($requestToken);
        } catch (Exception $error) {
            responseJson(['message' => $error->getMessage()]);
            //       http_response_code(500);

        }
    }


    public  function callback()
    {

        $modelSocialNetwork = new SocialNetworkAuthentication();
        try {
            $apiKey         =  $_ENV['TWITTER_API_KEY'];
            $apiSecret      =  $_ENV['TWITTER_API_SECRET'];
            $oauthToken     =  $this->request->input('oauth_token');
            $oauthVerifier  =  $this->request->input('oauth_verifier');
            $twitterClient  = new TwitterOAuth($apiKey, $apiSecret, $oauthToken, $oauthVerifier);
            $twitterClient->setTimeouts(30, 30);

            //   $accessToken    = $twitterClient->oauth('oauth/access_token', ['oauth_verifier' => $oauthVerifier]);

            $data_user    = $this->get_data_user_twtter($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
            $uniqueKeys = ['id_usuer' => 1, 'id_social_network' => 1];


            $modelSocialNetwork->updateOrInsert([
                "id_usuer"                 => 1,
                "id_social_network"        => 1,
                "nombre"                   => $data_user->name,
                "id_user_social_network"   => $data_user->id,
                "url_image_perfil"         => $data_user->profile_image_url_https,
                "user_name"                => $data_user->screen_name,
                "token_autenticacion"      => $oauthToken,
                "token_secret"             => $oauthVerifier,
            ], $uniqueKeys);


            $dataView = [

                'ficheros_js' => [recurso('conect_js')]



            ];
            $this->loadTemplate("socialMedia/callbakTwitter", $dataView);
            //      responseJson($accessToken);

        } catch (Exception $error) {


            http_response_code(500);
            echo json_encode(['message' => $error->getMessage()]);
        }
    }

    public function post_twiiter()
    {


        try {
            $apiKey         =  $_ENV['TWITTER_API_KEY'];
            $apiSecret      =  $_ENV['TWITTER_API_SECRET'];
            $oauthToken     =  $_SESSION['screen_name'];
            $oauthVerifier  =  $_SESSION['oauth_token_secret'];
            $connection     =  new TwitterOAuth($apiKey, $apiSecret, $oauthToken, $oauthVerifier);

            // Obtiene el contenido del tweet enviado desde el frontend
            $status = urldecode($_POST['status']);
            // Publica el tweet
            $result = $connection->post('statuses/update', ['status' => $status]);
            // Verifica si se ha producido algún error
            if (isset($result->errors)) {

                echo json_encode(['error' => 'Error al publicar el tweet', 'message' => $result->errors[0]->message]);

                http_response_code(400);
            } else {
                http_response_code(200);
                echo json_encode(['success' => 'Tweet publicado con éxito']);
            }
        } catch (Exception $error) {
            http_response_code(400);
            echo json_encode(['message' => $error->getMessage()]);
        }
    }

    public function get_data_user_twtter($oauthToken, $oauthVerifier)
    {


        $apiKey         =  $_ENV['TWITTER_API_KEY'];
        $apiSecret     =  $_ENV['TWITTER_API_SECRET'];


        try {
            $connection  = new TwitterOAuth($apiKey, $apiSecret, $oauthToken, $oauthVerifier);
            return $connection->get('account/verify_credentials');
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}
