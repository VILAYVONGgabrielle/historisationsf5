<?php

namespace App\Controller;

use App\Form\FormulaireType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormulaireController extends AbstractController
{
    /**
     * @Route("/formulaire", name="formulaire")
     */
    public function index(): Response
    {
        
        $formSociete = $this->createForm(FormulaireType::class);
        
        return $this->render('formulaire/index.html.twig', ['formSociete'=>$formSociete->createView()]);
    }
}
