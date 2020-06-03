<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"infos_user"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"infos_user"})
     */
    
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"infos_user"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups({"infos_user"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups({"infos_user"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"infos_user"})
     */
    private $image;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"infos_user"})
     */
    private $birthday;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=School::class, mappedBy="users")
     * @Groups({"school_user"})
     */
    private $schools;

    /**
     * @ORM\ManyToMany(targetEntity=Classroom::class, inversedBy="users")
     * @Groups({"classrooms_user"})
     */
    private $classrooms;

    /**
     * @ORM\ManyToMany(targetEntity=Subject::class, inversedBy="users")     
     * @Groups({"infos_user"})
     */
    private $subjects;

    /**
     * @ORM\OneToMany(targetEntity=Lesson::class, mappedBy="user")
     */
    private $lessons;

    /**
     * @ORM\OneToMany(targetEntity=Ressource::class, mappedBy="user")
     */
    private $ressources;

    /**
     * @ORM\OneToMany(targetEntity=Homework::class, mappedBy="user")
     */
    private $homeworks;

    /**
     * @ORM\OneToMany(targetEntity=Notice::class, mappedBy="author")
     */
    private $notices_author;

    /**
     * @ORM\OneToMany(targetEntity=Notice::class, mappedBy="receiver")
     */
    private $notices_receiver;

    /**
     * @ORM\OneToMany(targetEntity=Opinion::class, mappedBy="user", orphanRemoval=true)
     */
    private $opinions;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->schools = new ArrayCollection();
        $this->classrooms = new ArrayCollection();
        $this->subjects = new ArrayCollection();
        $this->lessons = new ArrayCollection();
        $this->ressources = new ArrayCollection();
        $this->homeworks = new ArrayCollection();
        $this->notices = new ArrayCollection();
        $this->notices_author = new ArrayCollection();
        $this->notices_receiver = new ArrayCollection();
        $this->opinions = new ArrayCollection();
    }

    /**
     * @Groups({"opinion_browse"})
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     * @Groups({"opinion_browse"})
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @Groups({"opinion_browse"})
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @Groups({"opinion_browse"})
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @Groups({"opinion_browse"})
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

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
     * @return Collection|School[]
     */
    public function getSchools(): Collection
    {
        return $this->schools;
    }

    public function addSchool(School $school): self
    {
        if (!$this->schools->contains($school)) {
            $this->schools[] = $school;
            $school->addUser($this);
        }

        return $this;
    }

    public function removeSchool(School $school): self
    {
        if ($this->schools->contains($school)) {
            $this->schools->removeElement($school);
            $school->removeUser($this);
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
        }

        return $this;
    }

    public function removeClassroom(Classroom $classroom): self
    {
        if ($this->classrooms->contains($classroom)) {
            $this->classrooms->removeElement($classroom);
        }

        return $this;
    }

    /**
     * @return Collection|Subject[]
     */
    public function getSubjects(): Collection
    {
        return $this->subjects;
    }

    public function addSubject(Subject $subject): self
    {
        if (!$this->subjects->contains($subject)) {
            $this->subjects[] = $subject;
        }

        return $this;
    }

    public function removeSubject(Subject $subject): self
    {
        if ($this->subjects->contains($subject)) {
            $this->subjects->removeElement($subject);
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
            $lesson->setUser($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->contains($lesson)) {
            $this->lessons->removeElement($lesson);
            // set the owning side to null (unless already changed)
            if ($lesson->getUser() === $this) {
                $lesson->setUser(null);
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
            $ressource->setUser($this);
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): self
    {
        if ($this->ressources->contains($ressource)) {
            $this->ressources->removeElement($ressource);
            // set the owning side to null (unless already changed)
            if ($ressource->getUser() === $this) {
                $ressource->setUser(null);
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
            $homework->setUser($this);
        }

        return $this;
    }

    public function removeHomework(Homework $homework): self
    {
        if ($this->homeworks->contains($homework)) {
            $this->homeworks->removeElement($homework);
            // set the owning side to null (unless already changed)
            if ($homework->getUser() === $this) {
                $homework->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notice[]
     */
    public function getNoticesAuthor(): Collection
    {
        return $this->notices_author;
    }

    public function addNoticesAuthor(Notice $noticesAuthor): self
    {
        if (!$this->notices_author->contains($noticesAuthor)) {
            $this->notices_author[] = $noticesAuthor;
            $noticesAuthor->setAuthor($this);
        }

        return $this;
    }

    public function removeNoticesAuthor(Notice $noticesAuthor): self
    {
        if ($this->notices_author->contains($noticesAuthor)) {
            $this->notices_author->removeElement($noticesAuthor);
            // set the owning side to null (unless already changed)
            if ($noticesAuthor->getAuthor() === $this) {
                $noticesAuthor->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notice[]
     */
    public function getNoticesReceiver(): Collection
    {
        return $this->notices_receiver;
    }

    public function addNoticesReceiver(Notice $noticesReceiver): self
    {
        if (!$this->notices_receiver->contains($noticesReceiver)) {
            $this->notices_receiver[] = $noticesReceiver;
            $noticesReceiver->setReceiver($this);
        }

        return $this;
    }

    public function removeNoticesReceiver(Notice $noticesReceiver): self
    {
        if ($this->notices_receiver->contains($noticesReceiver)) {
            $this->notices_receiver->removeElement($noticesReceiver);
            // set the owning side to null (unless already changed)
            if ($noticesReceiver->getReceiver() === $this) {
                $noticesReceiver->setReceiver(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Opinion[]
     */
    public function getOpinions(): Collection
    {
        return $this->opinions;
    }

    public function addOpinion(Opinion $opinion): self
    {
        if (!$this->opinions->contains($opinion)) {
            $this->opinions[] = $opinion;
            $opinion->setUser($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): self
    {
        if ($this->opinions->contains($opinion)) {
            $this->opinions->removeElement($opinion);
            // set the owning side to null (unless already changed)
            if ($opinion->getUser() === $this) {
                $opinion->setUser(null);
            }
        }

        return $this;
    }
}
