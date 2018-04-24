<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commission
 *
 * @ORM\Table(name="commission", indexes={@ORM\Index(name="idMerchant", columns={"idMerchant"}), @ORM\Index(name="idUser", columns={"idUser"})})
 * @ORM\Entity
 */
class Commission
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="cashback", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cashback;

    /**
     * @var \AppBundle\Entity\Merchant
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Merchant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMerchant", referencedColumnName="id")
     * })
     */
    private $idmerchant;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commission
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set cashback
     *
     * @param string $cashback
     *
     * @return Commission
     */
    public function setCashback($cashback)
    {
        $this->cashback = $cashback;

        return $this;
    }

    /**
     * Get cashback
     *
     * @return string
     */
    public function getCashback()
    {
        return $this->cashback;
    }

    /**
     * Set idmerchant
     *
     * @param \AppBundle\Entity\Merchant $idmerchant
     *
     * @return Commission
     */
    public function setIdmerchant(\AppBundle\Entity\Merchant $idmerchant = null)
    {
        $this->idmerchant = $idmerchant;

        return $this;
    }

    /**
     * Get idmerchant
     *
     * @return \AppBundle\Entity\Merchant
     */
    public function getIdmerchant()
    {
        return $this->idmerchant;
    }

    /**
     * Set iduser
     *
     * @param \AppBundle\Entity\User $iduser
     *
     * @return Commission
     */
    public function setIduser(\AppBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
