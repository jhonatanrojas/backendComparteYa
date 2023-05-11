<?php

namespace controllers;
use core\Controller;
use lib\SocialMediaPost;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class SocialMediaPostController extends Controller
{
    private $postSocialMedia;

    public function __construct()
    {
        $this->postSocialMedia = new SocialMediaPost();
    }

    public function index()
    {
        
     

            // Obtiene los datos de la publicación a partir de la solicitud
            $text = $_POST['text'];
         
            $images = !empty($_POST['images']) ? explode(',', $_POST['images']) : [];
            $videos = !empty($_POST['videos']) ? explode(',', $_POST['videos']) : [];
 
            $platforms = json_decode($_POST['platforms'], true);

            // Realiza la publicación en las redes sociales
            $results = [];
            foreach ($platforms as $platform) {
                switch ($platform['platform']) {
                    case 'Facebook':
                        $response = $this->postSocialMedia->postToFacebook(
                            $text,
                            $images,
                            $videos,
                            $platform['accessToken']
                        );
                        $results[]=[
                            'platform' => 'Facebook',
                            'result' => $response['result'],
                            'message' => $response['message'],
                            'error' => $response['error']
                        ];
                    
                        break;

                    case 'Twitter':
                        $response = $this->postSocialMedia->postToTwitter(
                            $text,
                            $images,
                            $platform['accessToken'],
                            $platform['accessTokenSecret']
                        );
                        
                        $results[]=[
                            'platform' => 'Twitter',
                            'result' => $response['result'],
                            'message' => $response['message'],
                            'error' => $response['error']
                        ];
                        break;

                        case 'Instagram':
                            $response = $this->postSocialMedia->postToInstagram(
                                $text,
                                $images,
                                $platform['accessToken'],
                                $platform['userId'],
                            );
                            
                            $results[]=[
                                'platform' => 'Instagram',
                                'result' => $response['result'],
                                'message' => $response['message'],
                                'error' => $response['error']
                            ];
                            break;
                    // Añade otros casos para otras plataformas aquí
                }
            }

            // Devuelve el resultado en formato JSON
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'results' => $results,
            ]);
        
    }
}
