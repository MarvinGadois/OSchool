<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ScheduleRepository::class)
 */
class Schedule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"schedule"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"schedule"})
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"schedule"})
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"schedule"})
     */
    private $path;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Classroom::class, inversedBy="schedules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classroom;


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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

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

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function setClassroom(?Classroom $classroom): self
    {
        $this->classroom = $classroom;

        return $this;
    }
}
