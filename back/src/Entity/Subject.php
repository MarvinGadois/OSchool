<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SubjectRepository::class)
 */
class Subject
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"infos_subject"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"infos_subject"})
     */
    private $title;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="subjects")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Homework::class, mappedBy="subject")
     */
    private $homework;

    /**
     * @ORM\OneToMany(targetEntity=Lesson::class, mappedBy="subject")
     */
    private $lessons;



    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->users = new ArrayCollection();
        $this->homework = new ArrayCollection();
        $this->lessons = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->title;
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
            $user->addSubject($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeSubject($this);
        }

        return $this;
    }

    /**
     * @return Collection|Homework[]
     */
    public function getHomework(): Collection
    {
        return $this->homework;
    }

    public function addHomework(Homework $homework): self
    {
        if (!$this->homework->contains($homework)) {
            $this->homework[] = $homework;
            $homework->setSubject($this);
        }

        return $this;
    }

    public function removeHomework(Homework $homework): self
    {
        if ($this->homework->contains($homework)) {
            $this->homework->removeElement($homework);
            // set the owning side to null (unless already changed)
            if ($homework->getSubject() === $this) {
                $homework->setSubject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Lesson[]
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    public function addLesson(Lesson $lesson): self
    {
        if (!$this->lessons->contains($lesson)) {
            $this->lessons[] = $lesson;
            $lesson->setSubject($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->contains($lesson)) {
            $this->lessons->removeElement($lesson);
            // set the owning side to null (unless already changed)
            if ($lesson->getSubject() === $this) {
                $lesson->setSubject(null);
            }
        }

        return $this;
    }
}
