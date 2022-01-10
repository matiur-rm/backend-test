<?php
// src/Controller/MicroController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use PDFStub;

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
    
   
    /**
     * @Route("/file_upload_post", name="file_list")
     * @Method ({"POST"})
     */
    public function fileUploadPost(Request $request): Response
    {

        $pdf_cnvert = new \PDFStub\Client('appId','accessToken');
        
        $file_name = $request->request->get('file_name');
        $file_format = $request->request->get('format');
       
  
       try {
           
           $splFileObject = new \SplFileInfo($file_name);
           $out_res = [];
           foreach($file_format as $key=>$value){
              $out_res[] = $pdf_cnvert->convertFile($splFileObject,$value);
             
           }
       
               return new Response(json_encode(array('urls' => $out_res)));    
            } catch (\Exception $exception) {
                return new Response($exception->getMessage());

            }
      
       
    }
}