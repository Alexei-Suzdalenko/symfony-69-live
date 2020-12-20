<?php

namespace App\Entity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Repository\DataUserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DataUserRepository::class)
 * @UniqueEntity(
 *     fields={"slug"},
 *     errorPath="slug",
 *     message="Usuario con este nombre ya fue registrado; Elige otro nombre"
 * )
 */
class DataUser
{
    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $townslug;

    /**
     * @return mixed
     */
    public function getTownslug()
    {
        return $this->townslug;
    }

    /**
     * @param mixed $townslug
     */
    public function setTownslug($townslug): void
    {
        $this->townslug = $townslug;
    }


    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $sex;

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex): void
    {
        $this->sex = $sex;
    }



    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $nacion;

    /**
     * @return mixed
     */
    public function getNacion()
    {
        return $this->nacion;
    }

    /**
     * @param mixed $nacion
     */
    public function setNacion($nacion): void
    {
        $this->nacion = $nacion;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town): void
    {
        $this->town = $town;
    }

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $town;

    /**
     * @ORM\Column(type="string", length=33)
     */
    private $tlf;

    /**
     * @return mixed
     */
    public function getTlf()
    {
        return $this->tlf;
    }

    /**
     * @param mixed $tlf
     */
    public function setTlf($tlf): void
    {
        $this->tlf = $tlf;
    }

    /**
     * @return mixed
     */
    public function getSobremi()
    {
        return $this->sobremi;
    }

    /**
     * @param mixed $sobremi
     */
    public function setSobremi($sobremi): void
    {
        $this->sobremi = $sobremi;
    }

    /**
     * @return mixed
     */
    public function getSlugprovince()
    {
        return $this->slugprovince;
    }

    /**
     * @param mixed $slugprovince
     */
    public function setSlugprovince($slugprovince): void
    {
        $this->slugprovince = $slugprovince;
    }

    /**
     * @ORM\Column(type="text",)
     */
    private $sobremi;

    /**
     * @ORM\Column(type="string", length=77)
     */
    private $slugprovince;

    /**
     * @return mixed
     */
    public function getSlugProv()
    {
        return $this->slugprovince;
    }

    /**
     * @param mixed $idcustomprovince
     */
    public function setSlugProv($slugprovince): void
    {
        $this->slugprovince = $slugprovince;
    }

    /**
     * @ORM\Column(type="string", length=333, unique=true, name="slug")
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Province", inversedBy="datauser")
     */
    private $province;

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     */
    public function setProvince($province): void
    {
        $this->province = $province;
    }

    /**
     * @ORM\Column(type="string", length=333)
     */
    private $name;


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

    /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUse()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=111, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

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
}
