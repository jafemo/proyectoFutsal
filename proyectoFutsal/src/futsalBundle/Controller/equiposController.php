<?php

namespace futsalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use futsalBundle\Entity\futsal;
use futsalBundle\Form\futsalType;
use Symfony\Component\HttpFoundation\Request;

class equiposController extends Controller
{

  /**
   * @Route("/equipos", name="equipos")
   */

   public function nuevoJugadorAction(Request $request){
     $jugador = new futsal();
     $form = $this->createForm(futsalType::class, $jugador);
     $form->handleRequest($request);

     if ($form->isSubmitted() && $form->isValid()) {
       $jugador = $form->getData();
       $em = $this->getDoctrine()->getManager();
       $em->persist($jugador);
       $em->flush();
       return $this->render('futsalBundle:carpeta_equipos:equipos.html.twig', array('tablaJugadores'=>$jugador));
     }

     return $this->render('futsalBundle:Default:nuevoJugador.html.twig', array('form'=>$form->createView()));
   }

   /**
    * @Route("/mostrarEquipos", name="mostrarEquipos")
    */
     public function mostrarEquipoAction()
     {
       //devolver la clase para interactuar con la BBDD
        $repository = $this->getDoctrine()->getRepository(futsal::class);
      //sacar lo que queramos de la base de datos
        $equipos= $repository->findAll();
        return $this->render('futsalBundle:carpeta_equipos:mostrarEquipos.html.twig', array('equipos'=>$equipos));
     }

     /**
      * @Route("/borrarEquipo/{id}", name="borrarEquipo")
      */
     public function borrarEquipoAction($id)
    {
      $DB = $this->getDoctrine()->getManager();
            $eliminar = $DB->getRepository(futsal::class)->find($id);
            if (!$eliminar) {
                throw $this->createNotFoundException(
                    'No se ha encontrado el id: '.$id
                );
            }
            $DB->remove($eliminar);
            $DB->flush();
            return $this->redirectToRoute('mostrarEquipos');
    }

    /**
     * @Route("/editarEquipo/{id}", name="editarEquipo")
     */
    public function editarRutaAction(Request $request, $id)
    {
      $equipo=$this->getDoctrine()->getRepository(futsal::class)->find($id);
      $form=$this->createForm(futsalType::class, $equipo);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
         //$cerveza = $form->getData();
         $em = $this->getDoctrine()->getManager();
         $em->persist($equipo);
         $em->flush();
         return $this->redirectToRoute('mostrarEquipos');
       }
      return $this->render('futsalBundle:carpeta_equipos:editarEquipo.html.twig', array('form'=>$form->createView()));
    }


}
