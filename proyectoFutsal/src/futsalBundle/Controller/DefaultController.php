<?php

namespace futsalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
  /**
   * @Route("/inicio", name="inicial")
   */
    public function inicioAction()
    {
        return $this->render('futsalBundle:Default:inicio.html.twig');
    }

    /**
     * @Route("/horarios", name="horarios")
     */
      public function horariosAction()
      {
          return $this->render('futsalBundle:Default:horarios.html.twig');
      }

      /**
       * @Route("/jornada", name="jornada")
       */
        public function jornadaAction()
        {
            return $this->render('futsalBundle:Default:jornada.html.twig');
        }

        /**
         * @Route("/quienSomos", name="quienSomos")
         */
          public function quienSomosAction()
          {
              return $this->render('futsalBundle:Default:quienSomos.html.twig');
          }

          /**
           * @Route("/equipos", name="equipos")
           */
            public function equiposAction()
            {
                return $this->render('futsalBundle:Default:equipos.html.twig');
            }
            /**
             * @Route("/fotos", name="fotos")
             */
              public function fotosAction()
              {
                  return $this->render('futsalBundle:Default:fotos.html.twig');
              }

              /**
               * @Route("/foro", name="foro")
               */
                public function foroAction()
                {
                    return $this->render('futsalBundle:Default:foro.html.twig');
                }

                /**
                 * @Route("/inicioSesion", name="inicioSesion")
                 */
                  public function inicioSesionAction()
                  {
                      return $this->render('futsalBundle:Default:inicioSesion.html.twig');
                  }

                  /**
                   * @Route("/registro", name="registro")
                   */
                    public function registroAction()
                    {
                        return $this->render('futsalBundle:Default:registro.html.twig');
                    }

}
