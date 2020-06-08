<?php

namespace App\Entity;

use App\Repository\ClassroomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ClassroomRepository::class)
 */
class Classroom
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"infos_classroom"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"infos_classroom"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups({"infos_classroom"})
     */
    private $level;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->schedules = new ArrayCollection();
        $this->ressources = new ArrayCollection();
        $this->lessons = new ArrayCollection();
        $this->homeworks = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }
    

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=School::class, inversedBy="classrooms")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"school_classroom"})
     */
    private $school;

    /**
     * @ORM\OneToMany(targetEntity=Schedule::class, mappedBy="classroom", orphanRemoval=true)
     * @Groups({"schedules_classroom"})
     */
    private $schedules;

    /**
     * @ORM\OneToMany(targetEntity=Ressource::class, mappedBy="classroom", orphanRemoval=true)
     */
    private $ressources;

    /**
     * @ORM\OneToMany(targetEntity=Lesson::class, mappedBy="classroom", orphanRemoval=true)
     */
    private $lessons;

    /**
     * @ORM\OneToMany(targetEntity=Homework::class, mappedBy="classroom", orphanRemoval=true)
     */
    private $homeworks;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="classrooms")
     * @Groups({"users_classroom"})
     */
    private $users;


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

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

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

    public function getSchool(): ?School
    {
        return $this->school;
    }

    public function setSchool(?School $school): self
    {
        $this->school = $school;

        return $this;
    }

    /**
     * @return Collection|Schedule[]
     */
    public function getSchedules(): Collection
    {
        return $this->schedules;
    }

    public function addSchedule(Schedule $schedule): self
    {
        if (!$this->schedules->contains($schedule)) {
            $this->schedules[] = $schedule;
            $schedule->setClassroom($this);
        }

        return $this;
    }

    public function removeSchedule(Schedule $schedule): self
    {
        if ($this->schedules->contains($schedule)) {
            $this->schedules->removeElement($schedule);
            // set the owning side to null (unless already changed)
            if ($schedule->getClassroom() === $this) {
                $schedule->setClassroom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ressource[]
     */
    public function getRessources(): Collection
    {
        return $this->ressources;
    }

    public function addRessource(Ressource $ressource): self
    {
        if (!$this->ressources->contains($ressource)) {
            $this->ressources[] = $ressource;
            $ressource->setClassroom($this);
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): self
    {
        if ($this->ressources->contains($ressource)) {
            $this->ressources->removeElement($ressource);
            // set the owning side to null (unless already changed)
            if ($ressource->getClassroom() === $this) {
                $ressource->setClassroom(null);
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
            $lesson->setClassroom($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->contains($lesson)) {
            $this->lessons->removeElement($lesson);
            // set the owning side to null (unless already changed)
            if ($lesson->getClassroom() === $this) {
                $lesson->setClassroom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Homework[]
     */
    public function getHomeworks(): Collection
    {
        return $this->homeworks;
    }

    public function addHomework(Homework $homework): self
    {
        if (!$this->homeworks->contains($homework)) {
            $this->homeworks[] = $homework;
            $homework->setClassroom($this);
        }

        return $this;
    }

    public function removeHomework(Homework $homework): self
    {
        if ($this->homeworks->contains($homework)) {
            $this->homeworks->removeElement($homework);
            // set the owning side to null (unless already changed)
            if ($homework->getClassroom() === $this) {
                $homework->setClassroom(null);
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
            $user->addClassroom($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeClassroom($this);
        }

        return $this;
    }
}
