<?php

namespace futsalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use futsalBundle\Entity\jornada;
use futsalBundle\Form\jornadaType;
use Symfony\Component\HttpFoundation\Request;

class jornadaController extends Controller{

  /**
   * @Route("/insertarJornada", name="insertarJornada")
   */

   public function nuevoJornadaAction(Request $request){
     $jornada = new jornada();
     $form = $this->createForm(jornadaType::class, $jornada);
     $form->handleRequest($request);
var_dump($jornada);

     if ($form->isSubmitted() && $form->isValid()) {

       $em = $this->getDoctrine()->getManager();
       $em->persist($jornada);
       $em->flush();
       return $this->render('futsalBundle:carpeta_jornada:insertarJornada.html.twig', array('TablaJornada'=>$jornada));
     }

     return $this->render('futsalBundle:carpeta_jornada:nuevaJornada.html.twig', array('form'=>$form->createView()));
   }


   /**
    * @Route("/mostrarJornada", name="mostrarJornada")
    */
     public function mostrarJornadaAction(){
       $repository = $this->getDoctrine()->getRepository(jornada::class);
         $jornada = $repository->findAll();
         return $this->render('futsalBundle:carpeta_jornada:mostrarJornada.html.twig', array('TablaJornada' =>$jornada));
     }


     /**
      * @Route("/borrarJornada/{id}", name="borrarJornada")
      */
      public function borrarJornadaAction($id)
      {
      $DB = $this->getDoctrine()->getManager();
            $eliminar = $DB->getRepository(jornada::class)->find($id);
            if (!$eliminar) {
                throw $this->createNotFoundException(
                    'No se ha encontrado el id: '.$id
                );
            }
            $DB->remove($eliminar);
            $DB->flush();
            return $this->redirectToRoute('mostrarJornada');
    }

    /**
     * @Route("/editarJornada/{id}", name="editarJornada")
     */
    public function editarRutaAction(Request $request, $id)
    {
      $jornada=$this->getDoctrine()->getRepository(jornada::class)->find($id);
      $form=$this->createForm(jornadaType::class, $jornada);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
         //$cerveza = $form->getData();
         $em = $this->getDoctrine()->getManager();
         $em->persist($jornada);
         $em->flush();
         return $this->redirectToRoute('mostrarJornada');
       }
      return $this->render('futsalBundle:carpeta_jornada:editarJornada.html.twig', array('form'=>$form->createView()));
    }


}
