<?php

namespace App\Entity;

use App\Repository\SchoolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SchoolRepository::class)
 */
class School
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"school"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"school"})
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        
        $this->news = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->classrooms = new ArrayCollection();
    }
    

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=News::class, mappedBy="school", orphanRemoval=true)
     */
    private $news;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="schools")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Classroom::class, mappedBy="school", orphanRemoval=true)
     */
    private $classrooms;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    /**
     * @return Collection|News[]
     */
    public function getNews(): Collection
    {
        return $this->news;
    }

    public function addNews(News $news): self
    {
        if (!$this->news->contains($news)) {
            $this->news[] = $news;
            $news->setSchool($this);
        }

        return $this;
    }

    public function removeNews(News $news): self
    {
        if ($this->news->contains($news)) {
            $this->news->removeElement($news);
            // set the owning side to null (unless already changed)
            if ($news->getSchool() === $this) {
                $news->setSchool(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|Classroom[]
     */
    public function getClassrooms(): Collection
    {
        return $this->classrooms;
    }

    public function addClassroom(Classroom $classroom): self
    {
        if (!$this->classrooms->contains($classroom)) {
            $this->classrooms[] = $classroom;
            $classroom->setSchool($this);
        }

        return $this;
    }

    public function removeClassroom(Classroom $classroom): self
    {
        if ($this->classrooms->contains($classroom)) {
            $this->classrooms->removeElement($classroom);
            // set the owning side to null (unless already changed)
            if ($classroom->getSchool() === $this) {
                $classroom->setSchool(null);
            }
        }

        return $this;
    }
}
