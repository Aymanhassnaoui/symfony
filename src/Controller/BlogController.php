<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class BlogController extends AbstractController
{

    
    /**
     * @Route("/blog", name="app_blog")
     */
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
     /**
     * @Route("/", name="base")
     */
    public function home()
    {   
      
        return $this->render('blog/home.html.twig',[
          
        ]);
    }
     /**
     * @Route("contact", name="contact")
     */
    public function new( Request $request ,
    EntityManagerInterface $manager)
    {
        
        $task = new Contact();
       
        $form = $this->createForm(ContactType::class, $task);
           

        $form->handleRequest($request);
        if ($form->isSubmitted()){
       
        $manager->persist($task);
     
        $manager->flush();
        }
        return $this->renderForm('blog/contact.html.twig', [
            'form' => $form,
        ]);

        
    }
}

