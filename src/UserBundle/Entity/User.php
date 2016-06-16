<?php

// src/AppBundle/Entity/User.php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**

* @ORM\Entity

* @ORM\Table("fos_user")

*/

class User extends BaseUser

{

/**

* @ORM\Id

* @ORM\Column(type="integer")

* @ORM\GeneratedValue(strategy="AUTO")

*/

protected $id;

public function __construct()

{

parent::__construct();

// your own logic

}

    /**
     * @var \SiteBundle\Entity\Budget
     */
    private $budget;


    /**
     * Set budget
     *
     * @param \SiteBundle\Entity\Budget $budget
     * @return User
     */
    public function setBudget(\SiteBundle\Entity\Budget $budget = null)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return \SiteBundle\Entity\Budget 
     */
    public function getBudget()
    {
        return $this->budget;
    }
}
