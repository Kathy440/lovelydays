<?php

namespace PropertiesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PropertiesBundle\Entity\Properties;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PropertiesBundle\Form\PropertiesType;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $repPropertie = $em->getRepository('PropertiesBundle:Properties');
        $properties = $repPropertie->findAll();

        return $this->render('PropertiesBundle:Default:accueil.html.twig', array('properties' => $properties));
    }


    public function deleteByIdAction($id) 
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('PropertiesBundle:Properties');

        $propertie = $rep->find($id);

        $em->remove($propertie);
        $em->flush();

        return $this->redirectToRoute('properties_homepage');
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $rep  = $em->getRepository('PropertiesBundle:Properties');

        $propertie = $rep->find($id);
        $form = $this->createForm(PropertiesType::class, $propertie);

        if($request->isMethod('Post')){
            $form->handleRequest($request);
            if($form->isValid()) {
                $em->persist($propertie);
                $em->flush();

                
                return $this->redirectToRoute('properties_homepage');
            }
        }
        $vars['form'] = $form->createView();

        return $this->render('@Properties/Default/update.html.twig', $vars);
    
        
    }




    public function searchAction(Request $request)
    {
        
        if($request->isXmlHttpRequest())
        {
            
            $mot_cle = $request->request->get('mot_cle');
            
             
           if(!empty($mot_cle))
            {
                
                $em = $this->getDoctrine()->getManager();
                $repPropertie = $em->getRepository('PropertiesBundle:Properties');
                //$repository = $this->getDoctrine()->getManager()->getRepository('PropertiesBundle:Properties');
                
                var_dump($mot_cle);die;
                $properties = $repPropertie->findByName($mot_cle);
                
                //$propertie = new JsonResponse();
                
                
                
            }
            
            return $this->render('PropertiesBundle:Properties:index.html.twig', array('properties'=> $properties));
        }

    }
   

    public function searchLocationAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repPropertie = $em->getRepository('PropertiesBundle:Properties');
        $properties = $repPropertie->findAll();

        return $this->render('PropertiesBundle:Default:location.html.twig', array('properties' => $properties));
    }

    



   /* public function ajaxAction(Request $request) {  
        $properties = $this->getDoctrine()->getRepository('PorpertiesBundle:Porperties')->findAll(); 
            
           
        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {  
           $jsonData = array();  
           $idx = 0;  
           foreach($properties as $propertie) {  
              $temp = array(
                 'location' => $propertie->getLocation(),  
                 'rooms' => $propertie->getRooms(),  
              );   
              $jsonData[$idx++] = $temp;  
           } 
           return new JsonResponse($jsonData); 
        } else { 
           return $this->render('PropertiesBundle:Default:location.html.twig'); 
        } 
     }         
*/

}

