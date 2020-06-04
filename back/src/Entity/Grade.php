<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"grade"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"grade"})
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"grade"})
     */
    private $grade;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=Homework::class, mappedBy="grade", cascade={"persist", "remove"})
     * @Groups({"grade_homework"})
     */
    private $homework;
    

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getHomework(): ?Homework
    {
        return $this->homework;
    }

    public function setHomework(?Homework $homework): self
    {
        $this->homework = $homework;

        // set (or unset) the owning side of the relation if necessary
        $newGrade = null === $homework ? null : $this;
        if ($homework->getGrade() !== $newGrade) {
            $homework->setGrade($newGrade);
        }

        return $this;
    }
}
