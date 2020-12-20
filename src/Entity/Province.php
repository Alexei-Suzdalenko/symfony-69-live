<?php

namespace App\Entity;

use App\Repository\ProvinceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProvinceRepository::class)
 */
class Province
{

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DataUser", mappedBy="prov")
     */
    public $datauser;

    /**
     * @return mixed
     */
    public function getDatauser()
    {
        return $this->datauser;
    }

    /**
     * @param mixed $datauser
     */
    public function setDatauser($datauser): void
    {
        $this->datauser = $datauser;
    }



    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=73, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=73, nullable=true)
     */
    private $slug;

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

}
