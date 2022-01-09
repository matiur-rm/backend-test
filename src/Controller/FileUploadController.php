<?php
// src/Controller/MicroController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileUploadController extends AbstractController
{
   
    
    /**
     * @Route("/file_upload")
     */
    public function fileUpload(): Response
    {
        $number = 6565654;

        return $this->render('file_upload/add.html.twig', [
            'number' => $number,
        ]);
    }
}