<?php

namespace Mshem\OrmOdmRelationBundle\Controller;

use Doctrine\Common\Annotations\AnnotationReader;
use Mshem\OrmOdmRelationBundle\Annotation\ORM\OneToManyConverter;
use Mshem\OrmOdmRelationBundle\Document\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        $reader = new AnnotationReader();
        $converter = new OneToManyConverter($reader);

        $person = new User();
        $standardObject = $converter->convert($person);

        return $this->render('OrmOdmRelationBundle:Default:index.html.twig');
    }
}
