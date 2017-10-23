<?php

namespace futsalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
  /**
   * @Route("/proyecto", name="inicial")
   */
    public function indexAction()
    {
        return $this->render('futsalBundle:Default:index.html.twig');
    }

    /**
     * @Route("/horarios", name="horarios")
     */
      public function indexAction()
      {
          return $this->render('futsalBundle:Default:horarios.html.twig');
      }

      /**
       * @Route("/jornada", name="jornada")
       */
        public function indexAction()
        {
            return $this->render('futsalBundle:Default:jornada.html.twig');
        }

        /**
         * @Route("/quienSomos", name="quienSomos")
         */
          public function indexAction()
          {
              return $this->render('futsalBundle:Default:quienSomos.html.twig');
          }

          /**
           * @Route("/equipos", name="equipos")
           */
            public function indexAction()
            {
                return $this->render('futsalBundle:Default:equipos.html.twig');
            }
            /**
             * @Route("/fotos", name="fotos")
             */
              public function indexAction()
              {
                  return $this->render('futsalBundle:Default:fotos.html.twig');
              }

              /**
               * @Route("/foro", name="foro")
               */
                public function indexAction()
                {
                    return $this->render('futsalBundle:Default:foro.html.twig');
                }

                /**
                 * @Route("/inicioSesion", name="inicioSesion")
                 */
                  public function indexAction()
                  {
                      return $this->render('futsalBundle:Default:inicioSesion.html.twig');
                  }

                  /**
                   * @Route("/registro", name="registro")
                   */
                    public function indexAction()
                    {
                        return $this->render('futsalBundle:Default:registro.html.twig');
                    }

}
