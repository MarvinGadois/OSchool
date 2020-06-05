<?php

namespace App\Entity;

use App\Repository\HomeworkRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=HomeworkRepository::class)
 */
class Homework
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"homework"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"homework"})
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"homework"})
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"homework"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"homework"})
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
     * @ORM\ManyToOne(targetEntity=Classroom::class, inversedBy="homeworks")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"homework_classroom"})
     */
    private $classroom;

    /**
     * @ORM\OneToOne(targetEntity=Grade::class, inversedBy="homework", cascade={"persist", "remove"})
     * @Groups({"homework_grade"})
     */
    private $grade;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="homeworks")
     * @Groups({"homework_user"})
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"homework"})
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"homework"})
     */
    private $correctionPath;

    /**
     * @ORM\ManyToOne(targetEntity=Subject::class, inversedBy="homework")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"homework_subject"})
     */
    private $subject;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->status = 0;
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

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
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

    public function getGrade(): ?Grade
    {
        return $this->grade;
    }

    public function setGrade(?Grade $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCorrectionPath(): ?string
    {
        return $this->correctionPath;
    }

    public function setCorrectionPath(?string $correctionPath): self
    {
        $this->correctionPath = $correctionPath;

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->subject;
    }

    public function setSubject(?Subject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }
}
