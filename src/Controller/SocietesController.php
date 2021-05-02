<?php

namespace App\Controller;

use App\Entity\Adresses;
use App\Entity\Societes;
use App\Form\SocieteType;
use App\Repository\SocietesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocietesController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/societes", name="societes")
     */
    public function index(): Response
    {

       $adresseAll = $this->entityManager->getRepository(Adresses::class)->findAll();

        //dump($societeAll); exit;

        return $this->render('societes/index.html.twig', [
            'title'=>'liste complète des sociétés',
            'adresseAll' => $adresseAll
        ]);
    }


    /**
    * @Route("/societes/ajouter-une-societe", name="societe_add")
    */
        public function addSociete(Request $request): Response
        {
            $societe = new Societes();
            $adresse = new Adresses();
           
            $societe->getAdresses()->add($adresse);
            $adresse->setSociete($societe->getId());

            $societeForm = $this->createForm(SocieteType::class, $societe);

            $societeForm->handleRequest($request);
           
            //dd($societeForm);

            if($societeForm->isSubmitted() && $societeForm->isValid()){
                
                $this->entityManager->persist($societe);
                //$adresse->setSociete($societe->getId()); // recupere la PK id de societes
                //$this->entityManager->persist($adresse);
               // $societeForm = $this->createForm(SocieteType::class, $societe);
                $this->entityManager->flush();
            }
            
            
            return $this->render('societes/societe_add.html.twig',[
                'title'=>'formulaire de création',
                'societeForm'=>$societeForm->createView()
                ]);
        }


    /**
     * @Route("/societes/modifier-une-societe/{id}", name="societe_edit")
     */
        public function editSociete(Request $rq, $id): Response
        {
            $societeOne = new Societes();
            $adresseOne = $this->entityManager->getRepository(Societes::class)->findOneBy(['id'=>$id]);
            //dump($adresseOne); exit;
            $societeOne->getAdresses()->add($adresseOne);

            $societeForm = $this->createForm(SocieteType::class, $adresseOne);
            //dump($societeForm ); exit;

            $societeForm->handleRequest($rq);

            if($societeForm->isSubmitted() && $societeForm->isValid())
            {
                $this->entityManager->flush();
                return $this->redirectToRoute('societes');
            }

            return $this->render('societes/societe_edit.html.twig',[
                'title'=>'formulaire de modification',
                'societeForm'=>$societeForm->createView()
                ]);
        }
}
