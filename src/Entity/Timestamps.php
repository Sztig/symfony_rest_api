<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait Timestamps
{
    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateAt;

    /**
     * @ORM\PrePersist()
     */
    public function createdAt()
    {
        $this->createdAt = new \DateTime();
        $this->updateAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate()
     */
    public function updateAt()
    {
        $this->updateAt= new \DateTime();
    }
}