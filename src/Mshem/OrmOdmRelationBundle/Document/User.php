<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 13.09.17
 * Time: 22:27
 */

namespace Mshem\OrmOdmRelationBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Mshem\OrmOdmRelationBundle\Annotation\ORM\OneToMany;

/**
 * @MongoDB\Document
 *
 */
class User {

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     *
     */
    protected $name;

    /**
     * @OneToMany("name", dataType="string")
     */
    public function getName()
    {
        return 'Matthias Noback';
    }

}