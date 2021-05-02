<?php

namespace App\Controller;

use App\Entity\Adresses;
use App\Form\AdresseType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdressesController extends AbstractController
{
    /**
     * @Route("/adresses", name="adresses")
     */
    public function index(): Response
    {
        return $this->render('adresses/index.html.twig');
    }


    /**
    * @Route("/adresses/ajouter-une-adresse", name="adresse_add")
    */
    public function addAdresse(): Response
    {
      
        $adresse = new Adresses();
        $adresseForm = $this->createForm(AdresseType::class, $adresse);
        
        return $this->render('societes/adresse_add.html.twig',['adresseForm'=>$adresseForm ->createView()]);
    }
}
