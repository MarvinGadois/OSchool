<?php

namespace App\DataFixtures;

use App\Entity\Classroom;
use App\Entity\School;
use App\Entity\Subject;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;


    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $em)
    {
        $schools = [];
        $classrooms = [];
        $subjects = [];
        $users = [];
        $dateTime = new \DateTime();


        // SCHOOL
        $school = new School();
        $school->setName("Poudlard");
        $schools[] = $school;
        $em->persist($school);

        // CLASSROOM
        $serdaigleA = new Classroom();
        $serdaigleA->setName("Serdaigle A");
        $serdaigleA->setLevel("Première année");
        $serdaigleA->setSchool($school);
        $classrooms[] = $serdaigleA;
        $em->persist($serdaigleA);

        $gryffondorD = new Classroom();
        $gryffondorD->setName("Gryffondor D");
        $gryffondorD->setLevel("Quatrième année");
        $gryffondorD->setSchool($school);
        $classrooms[] = $gryffondorD;
        $em->persist($gryffondorD);


        // SUBJECT
        $astronomie = new Subject();
        $astronomie->setTitle("Astronomie");
        $subjects[] = $astronomie;
        $em->persist($astronomie);

        $metamarphose = new Subject();
        $metamarphose->setTitle("Métamarphose");
        $subjects[] = $metamarphose;
        $em->persist($metamarphose);


        // USER TEACHER
        $mcgonagall = new User();
        $mcgonagall->setLastname("Mc Gonagall");
        $mcgonagall->setFirstname("Minerva");
        $mcgonagall->setEmail("minerva.mcgonagall@poudlard.com");
        $mcgonagall->setRoles(["ROLE_TEACHER"]);
        $mcgonagall->setImage("profiles/mcgonagall.jpg");
        $mcgonagall->setBirthday($dateTime->setDate(19345, 10, 04));
        $mcgonagall->setPassword($this->passwordEncoder->encodePassword($mcgonagall, 'minerva'));
        $mcgonagall->addSchool($school);
        $mcgonagall->addSubject($metamarphose);
        $mcgonagall->addClassroom($serdaigleA);
        $users[] = $mcgonagall;
        $em->persist($mcgonagall);


        // USER STUDENT
        $hpotter = new User();
        $hpotter->setLastname("Potter");
        $hpotter->setFirstname("Harry");
        $hpotter->setEmail("harry.potter@poudlard.com");
        $hpotter->setRoles(["ROLE_STUDENT"]);
        $hpotter->setImage("profiles/hpotter.jpg");
        $hpotter->setBirthday($dateTime->setDate(1980, 07, 31));
        $hpotter->setPassword($this->passwordEncoder->encodePassword($hpotter, 'harry'));
        $hpotter->addSchool($school);
        $hpotter->addClassroom($gryffondorD);
        $users[] = $hpotter;
        $em->persist($hpotter);

        // $em->flush();
    }
}