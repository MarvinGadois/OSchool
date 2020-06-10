<?php

namespace App\DataFixtures;

use App\Entity\Classroom;
use App\Entity\Grade;
use App\Entity\Homework;
use App\Entity\Notice;
use App\Entity\Lesson;
use App\Entity\Opinion;
use App\Entity\Ressource;
use App\Entity\School;
use App\Entity\Subject;
use App\Entity\User;
use App\Entity\News;
use App\Entity\Schedule;
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
        $opinions = [];
        $ressources = [];
        $news = [];
        $notices = [];
        $lessons = [];
        $schedules = [];


        // SCHOOL
        $school = new School();
        $school->setName("Poudlard");
        $schools[] = $school;
        $em->persist($school);

        $oschool = new School();
        $oschool->setName("Oschool");
        $schools[] = $oschool;
        $em->persist($oschool);


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

        $serpentardC = new Classroom();
        $serpentardC->setName("Serpentard C");
        $serpentardC->setLevel("Troisième Année");
        $serpentardC->setSchool($school);
        $classrooms[] = $serpentardC;
        $em->persist($serpentardC);

        $poufsouffleB = new Classroom();
        $poufsouffleB->setName("Poufsouffle B");
        $poufsouffleB->setLevel("Deuxième Année");
        $poufsouffleB->setSchool($school);
        $classrooms[] = $poufsouffleB;
        $em->persist($poufsouffleB);


        // SCHEDULES

        $schedule1 = new Schedule();
        $schedule1->setTitle("Emploi du temps de Serdaigle A");
        $schedule1->setPath("edt-S-A.PNG");
        $schedule1->setClassroom($gryffondorD);
        $schedules[] = $schedule1;
        $em->persist($schedule1);

        $schedule2 = new Schedule();
        $schedule2->setTitle("Emploi du temps de Gryffondor D");
        $schedule2->setPath("edt-G-D.PNG");
        $schedule2->setClassroom($serdaigleA);
        $schedules[] = $schedule2;
        $em->persist($schedule2);

        $schedule3 = new Schedule();
        $schedule3->setTitle("Emploi du temps de Serpentard C");
        $schedule3->setPath("edt-Serp-C.PNG");
        $schedule3->setClassroom($serpentardC);
        $schedules[] = $schedule3;
        $em->persist($schedule3);

        $schedule4 = new Schedule();
        $schedule4->setTitle("Emploi du temps de Poufsouffle B");
        $schedule4->setPath("edt-P-B.PNG");
        $schedule4->setClassroom($poufsouffleB);
        $schedules[] = $schedule4;
        $em->persist($schedule4);


        // SUBJECT
        $astronomie = new Subject();
        $astronomie->setTitle("Astronomie");
        $subjects[] = $astronomie;
        $em->persist($astronomie);
        
        $botanique = new Subject();
        $botanique->setTitle("Botanique");
        $subjects[] = $botanique;
        $em->persist($botanique);

        $divination = new Subject();
        $divination->setTitle("Divination");
        $subjects[] = $divination;
        $em->persist($divination);

        $histoire = new Subject();
        $histoire->setTitle("Histoire de la magie");
        $subjects[] = $histoire;
        $em->persist($histoire);

        $metamarphose = new Subject();
        $metamarphose->setTitle("Métamarphose");
        $subjects[] = $metamarphose;
        $em->persist($metamarphose);

        $moldus = new Subject();
        $moldus->setTitle("Etude des moldus");
        $subjects[] = $moldus;
        $em->persist($moldus);

        $potions = new Subject();
        $potions->setTitle("Potions");
        $subjects[] = $potions;
        $em->persist($potions);

        $quidditch = new Subject();
        $quidditch->setTitle("Quidditch");
        $subjects[] = $quidditch;
        $em->persist($quidditch);

        $sortileges = new Subject();
        $sortileges->setTitle("Sortilèges");
        $subjects[] = $sortileges;
        $em->persist($sortileges);

        $francais = new Subject();
        $francais->setTitle("Français");
        $subjects[] = $francais;
        $em->persist($francais);

        $mathematiques = new Subject();
        $mathematiques->setTitle("Mathématiques");
        $subjects[] = $mathematiques;
        $em->persist($mathematiques);

        $sciences = new Subject();
        $sciences->setTitle("Sciences");
        $subjects[] = $sciences;
        $em->persist($sciences);

        $sport = new Subject();
        $sport->setTitle("Sport");
        $subjects[] = $sport;
        $em->persist($sport);
        
        // USER TEACHER

        $hagrid = new User();
        $hagrid->setLastname("Hagrid");
        $hagrid->setFirstname("Rubeus");
        $hagrid->setEmail("rubeus.hagrid@poudlard.com");
        $hagrid->setRoles(["ROLE_TEACHER"]);
        $hagrid->setImage("");
        $hagrid->setBirthday(new \DateTime('12/06/1928'));
        $hagrid->setPassword($this->passwordEncoder->encodePassword($hagrid, 'rubeus'));
        $hagrid->addSchool($school);
        $hagrid->addSubject($sport);
        $hagrid->addClassroom($poufsouffleB);
        $users[] = $hagrid;
        $em->persist($hagrid);

        $ombrage = new User();
        $ombrage->setLastname("Ombrage");
        $ombrage->setFirstname("Dolores");
        $ombrage->setEmail("dolores.ombrage@poudlard.com");
        $ombrage->setRoles(["ROLE_TEACHER"]);
        $ombrage->setImage("");
        $ombrage->setBirthday(new \DateTime('08/26/1965'));
        $ombrage->setPassword($this->passwordEncoder->encodePassword($ombrage, 'dolores'));
        $ombrage->addSchool($school);
        $ombrage->addSubject($sciences);
        $ombrage->addClassroom($serpentardC);
        $users[] = $ombrage;
        $em->persist($ombrage);

        $lupin = new User();
        $lupin->setLastname("Lupin");
        $lupin->setFirstname("Remus");
        $lupin->setEmail("remus.lupin@poudlard.com");
        $lupin->setRoles(["ROLE_TEACHER"]);
        $lupin->setImage("");
        $lupin->setBirthday(new \DateTime('03/10/1960'));
        $lupin->setPassword($this->passwordEncoder->encodePassword($lupin, 'remus'));
        $lupin->addSchool($school);
        $lupin->addSubject($mathematiques);
        $lupin->addClassroom($poufsouffleB);
        $users[] = $lupin;
        $em->persist($lupin);

        $quirrell = new User();
        $quirrell->setLastname("Quirrell");
        $quirrell->setFirstname("Quirinus");
        $quirrell->setEmail("quirinus.quirrell@poudlard.com");
        $quirrell->setRoles(["ROLE_TEACHER"]);
        $quirrell->setImage("");
        $quirrell->setBirthday(new \DateTime('09/26/1952'));
        $quirrell->setPassword($this->passwordEncoder->encodePassword($quirrell, 'quirinus'));
        $quirrell->addSchool($school);
        $quirrell->addSubject($francais);
        $quirrell->addClassroom($serpentardC);
        $users[] = $quirrell;
        $em->persist($quirrell);

        $bibine = new User();
        $bibine->setLastname("Bibine");
        $bibine->setFirstname("Renée");
        $bibine->setEmail("renee.bibine@poudlard.com");
        $bibine->setRoles(["ROLE_TEACHER"]);
        $bibine->setImage("profiles/bibine.png");
        $bibine->setBirthday(new \DateTime('11/02/1940'));
        $bibine->setPassword($this->passwordEncoder->encodePassword($bibine, 'renee'));
        $bibine->addSchool($school);
        $bibine->addSubject($quidditch);
        $bibine->addClassroom($gryffondorD);
        $users[] = $bibine;
        $em->persist($bibine);

        $binns = new User();
        $binns->setLastname("Binns");
        $binns->setFirstname("Cuthbert");
        $binns->setEmail("cuthbert.binns@poudlard.com");
        $binns->setRoles(["ROLE_TEACHER"]);
        $binns->setImage("profiles/binns.jpg");
        $binns->setBirthday(new \DateTime('08/24/1955')); 
        $binns->setPassword($this->passwordEncoder->encodePassword($binns, 'cuthbert'));
        $binns->addSchool($school);
        $binns->addSubject($histoire);
        $binns->addClassroom($serdaigleA);
        $users[] = $binns;
        $em->persist($binns);

        $burbage = new User();
        $burbage->setLastname("Burbage");
        $burbage->setFirstname("Charity");
        $burbage->setEmail("charity.burbage@poudlard.com");
        $burbage->setRoles(["ROLE_TEACHER"]);
        $burbage->setImage("");
        $burbage->setBirthday(new \DateTime('02/17/1962'));
        $burbage->setPassword($this->passwordEncoder->encodePassword($burbage, 'charity'));
        $burbage->addSchool($school);
        $burbage->addSubject($moldus);
        $burbage->addClassroom($serdaigleA);
        $users[] = $burbage;
        $em->persist($burbage);
        
        $chourave = new User();
        $chourave->setLastname("Chourave");
        $chourave->setFirstname("Pomona");
        $chourave->setEmail("pomona.chourave@poudlard.com");
        $chourave->setRoles(["ROLE_TEACHER"]);
        $chourave->setImage("profiles/chourave.jpg");
        $chourave->setBirthday(new \DateTime('05/15/1931'));
        $chourave->setPassword($this->passwordEncoder->encodePassword($chourave, 'pomona'));
        $chourave->addSchool($school);
        $chourave->addSubject($botanique);
        $chourave->addClassroom($serdaigleA);
        $users[] = $chourave;
        $em->persist($chourave);

        $flitwick = new User();
        $flitwick->setLastname("Flitwick");
        $flitwick->setFirstname("Filius");
        $flitwick->setEmail("filius.flitwick@poudlard.com");
        $flitwick->setRoles(["ROLE_TEACHER"]);
        $flitwick->setImage("profiles/flitwick.jpg");
        $flitwick->setBirthday(new \DateTime('10/17/1947'));
        $flitwick->setPassword($this->passwordEncoder->encodePassword($flitwick, 'filius'));
        $flitwick->addSchool($school);
        $flitwick->addSubject($sortileges);
        $flitwick->addClassroom($gryffondorD);
        $users[] = $flitwick;
        $em->persist($flitwick);

        $mcgonagall = new User();
        $mcgonagall->setLastname("Mc Gonagall");
        $mcgonagall->setFirstname("Minerva");
        $mcgonagall->setEmail("minerva.mcgonagall@poudlard.com");
        $mcgonagall->setRoles(["ROLE_TEACHER"]);
        $mcgonagall->setImage("profiles/mcgonagall.jpg");
        $mcgonagall->setBirthday(new \DateTime('10/04/1935'));
        $mcgonagall->setPassword($this->passwordEncoder->encodePassword($mcgonagall, 'minerva'));
        $mcgonagall->addSchool($school);
        $mcgonagall->addSubject($metamarphose);
        $mcgonagall->addClassroom($gryffondorD);
        $users[] = $mcgonagall;
        $em->persist($mcgonagall);
        
        $rogue = new User();
        $rogue->setLastname("Rogue");
        $rogue->setFirstname("Severus");
        $rogue->setEmail("severus.rogue@poudlard.com");
        $rogue->setRoles(["ROLE_TEACHER"]);
        $rogue->setImage("profiles/rogue.jpg");
        $rogue->setBirthday(new \DateTime('01/09/1960'));
        $rogue->setPassword($this->passwordEncoder->encodePassword($rogue, 'severus'));
        $rogue->addSchool($school);
        $rogue->addSubject($potions);
        $rogue->addClassroom($gryffondorD);
        $rogue->addClassroom($serpentardC);
        $users[] = $rogue;
        $em->persist($rogue);

        $sinistra = new User();
        $sinistra->setLastname("Sinistra");
        $sinistra->setFirstname("Aurora");
        $sinistra->setEmail("aurora.sinistra@poudlard.com");
        $sinistra->setRoles(["ROLE_TEACHER"]);
        $sinistra->setImage("profiles/sinistra.jpg");
        $sinistra->setBirthday(new \DateTime('07/15/1964'));
        $sinistra->setPassword($this->passwordEncoder->encodePassword($sinistra, 'aurora'));
        $sinistra->addSchool($school);
        $sinistra->addSubject($astronomie);
        $sinistra->addClassroom($serdaigleA);
        $users[] = $sinistra;
        $em->persist($sinistra);

        $trelawney = new User();
        $trelawney->setLastname("Trelawney");
        $trelawney->setFirstname("Sibylle");
        $trelawney->setEmail("sibylle.trelawney@poudlard.com");
        $trelawney->setRoles(["ROLE_TEACHER"]);
        $trelawney->setImage("profiles/trelawney.jpg");
        $trelawney->setBirthday(new \DateTime('03/09/1975'));
        $trelawney->setPassword($this->passwordEncoder->encodePassword($trelawney, 'sibylle'));
        $trelawney->addSchool($school);
        $trelawney->addSubject($divination);
        $trelawney->addClassroom($gryffondorD);
        $users[] = $trelawney;
        $em->persist($trelawney);

        // USER STUDENT

        $aegwu = new User();
        $aegwu->setLastname("Egwu");
        $aegwu->setFirstname("André");
        $aegwu->setEmail("andre.egwu@poudlard.com");
        $aegwu->setRoles(["ROLE_STUDENT"]);
        $aegwu->setImage("profiles/aegwu.jpg");
        $aegwu->setBirthday(new \DateTime('12/02/1972'));
        $aegwu->setPassword($this->passwordEncoder->encodePassword($aegwu, 'andre'));
        $aegwu->addSchool($school);
        $aegwu->addClassroom($serdaigleA);
        $users[] = $aegwu;
        $em->persist($aegwu);

        $agoldstein = new User();
        $agoldstein->setLastname("Goldstein");
        $agoldstein->setFirstname("Anthony");
        $agoldstein->setEmail("anthony.goldstein@poudlard.com");
        $agoldstein->setRoles(["ROLE_STUDENT"]);
        $agoldstein->setImage("profiles/agoldstein.png");
        $agoldstein->setBirthday(new \DateTime('06/17/1979'));
        $agoldstein->setPassword($this->passwordEncoder->encodePassword($agoldstein, 'anthony'));
        $agoldstein->addSchool($school);
        $agoldstein->addClassroom($serdaigleA);
        $users[] = $agoldstein;
        $em->persist($agoldstein);

        $ajohnson = new User();
        $ajohnson->setLastname("Johnson");
        $ajohnson->setFirstname("Angelina");
        $ajohnson->setEmail("angelina.johnson@poudlard.com");
        $ajohnson->setRoles(["ROLE_STUDENT"]);
        $ajohnson->setImage("profiles/ajohnson.jpg");
        $ajohnson->setBirthday(new \DateTime('10/28/1977'));
        $ajohnson->setPassword($this->passwordEncoder->encodePassword($ajohnson, 'angelina'));
        $ajohnson->addSchool($school);
        $ajohnson->addClassroom($gryffondorD);
        $users[] = $ajohnson;
        $em->persist($ajohnson);

        $ccrivey = new User();
        $ccrivey->setLastname("Crivey");
        $ccrivey->setFirstname("Colin");
        $ccrivey->setEmail("colin.crivey@poudlard.com");
        $ccrivey->setRoles(["ROLE_STUDENT"]);
        $ccrivey->setImage("profiles/ccrivey.jpg");
        $ccrivey->setBirthday(new \DateTime('12/18/1981'));
        $ccrivey->setPassword($this->passwordEncoder->encodePassword($ccrivey, 'colin'));
        $ccrivey->addSchool($school);
        $ccrivey->addClassroom($gryffondorD);
        $users[] = $ccrivey;
        $em->persist($ccrivey);

        $cchang = new User();
        $cchang->setLastname("Chang");
        $cchang->setFirstname("Cho");
        $cchang->setEmail("cho.chang@poudlard.com");
        $cchang->setRoles(["ROLE_STUDENT"]);
        $cchang->setImage("profiles/cchang.jpg");
        $cchang->setBirthday(new \DateTime('02/14/1978'));
        $cchang->setPassword($this->passwordEncoder->encodePassword($cchang, 'cho'));
        $cchang->addSchool($school);
        $cchang->addClassroom($serdaigleA);
        $users[] = $cchang;
        $em->persist($cchang);

        $cdiggory = new User();
        $cdiggory->setLastname("Diggory");
        $cdiggory->setFirstname("Cedric");
        $cdiggory->setEmail("cedric.diggory@poudlard.com");
        $cdiggory->setRoles(["ROLE_STUDENT"]);
        $cdiggory->setImage("");
        $cdiggory->setBirthday(new \DateTime('03/22/1977'));
        $cdiggory->setPassword($this->passwordEncoder->encodePassword($cdiggory, 'cedric'));
        $cdiggory->addSchool($school);
        $cdiggory->addClassroom($poufsouffleB);
        $users[] = $cdiggory;
        $em->persist($cdiggory);

        $cmclaggen = new User();
        $cmclaggen->setLastname("McLaggen");
        $cmclaggen->setFirstname("Cormac");
        $cmclaggen->setEmail("cormac.mclaggen@poudlard.com");
        $cmclaggen->setRoles(["ROLE_STUDENT"]);
        $cmclaggen->setImage("profiles/cmclaggen.jpg");
        $cmclaggen->setBirthday(new \DateTime('06/17/1978'));
        $cmclaggen->setPassword($this->passwordEncoder->encodePassword($cmclaggen, 'cormac'));
        $cmclaggen->addSchool($school);
        $cmclaggen->addClassroom($gryffondorD);
        $users[] = $cmclaggen;
        $em->persist($cmclaggen);

        $dcrivey = new User();
        $dcrivey->setLastname("Crivey");
        $dcrivey->setFirstname("Dennis");
        $dcrivey->setEmail("dennis.crivey@poudlard.com");
        $dcrivey->setRoles(["ROLE_STUDENT"]);
        $dcrivey->setImage("profiles/dcrivey.jpg");
        $dcrivey->setBirthday(new \DateTime('09/12/1982'));
        $dcrivey->setPassword($this->passwordEncoder->encodePassword($dcrivey, 'dennis'));
        $dcrivey->addSchool($school);
        $dcrivey->addClassroom($gryffondorD);
        $users[] = $dcrivey;
        $em->persist($dcrivey);

        $dmalefoy = new User();
        $dmalefoy->setLastname("Malefoy");
        $dmalefoy->setFirstname("Drago");
        $dmalefoy->setEmail("drago.malefoy@poudlard.com");
        $dmalefoy->setRoles(["ROLE_STUDENT"]);
        $dmalefoy->setImage("");
        $dmalefoy->setBirthday(new \DateTime('06/05/1980'));
        $dmalefoy->setPassword($this->passwordEncoder->encodePassword($dmalefoy, 'drago'));
        $dmalefoy->addSchool($school);
        $dmalefoy->addClassroom($serpentardC);
        $users[] = $dmalefoy;
        $em->persist($dmalefoy);

        $eabercrombie = new User();
        $eabercrombie->setLastname("Abercrombie");
        $eabercrombie->setFirstname("Euan");
        $eabercrombie->setEmail("euan.abercrombie@poudlard.com");
        $eabercrombie->setRoles(["ROLE_STUDENT"]);
        $eabercrombie->setImage("profiles/eabercrombie.jpg");
        $eabercrombie->setBirthday(new \DateTime('10/12/1984'));
        $eabercrombie->setPassword($this->passwordEncoder->encodePassword($eabercrombie, 'euan'));
        $eabercrombie->addSchool($school);
        $eabercrombie->addClassroom($gryffondorD);
        $users[] = $eabercrombie;
        $em->persist($eabercrombie);

        $ecarmichael = new User();
        $ecarmichael->setLastname("Carmichael");
        $ecarmichael->setFirstname("Eddie");
        $ecarmichael->setEmail("eddie.carmichael@poudlard.com");
        $ecarmichael->setRoles(["ROLE_STUDENT"]);
        $ecarmichael->setImage("");
        $ecarmichael->setBirthday(new \DateTime('06/18/1979'));
        $ecarmichael->setPassword($this->passwordEncoder->encodePassword($ecarmichael, 'eddie'));
        $ecarmichael->addSchool($school);
        $ecarmichael->addClassroom($serdaigleA);
        $users[] = $ecarmichael;
        $em->persist($ecarmichael);

        $emacmillan = new User();
        $emacmillan->setLastname("Macmillan");
        $emacmillan->setFirstname("Ernie");
        $emacmillan->setEmail("ernie.macmillan@poudlard.com");
        $emacmillan->setRoles(["ROLE_STUDENT"]);
        $emacmillan->setImage("");
        $emacmillan->setBirthday(new \DateTime('04/22/1980'));
        $emacmillan->setPassword($this->passwordEncoder->encodePassword($emacmillan, 'ernie'));
        $emacmillan->addSchool($school);
        $emacmillan->addClassroom($poufsouffleB);
        $users[] = $emacmillan;
        $em->persist($emacmillan);

        $fweasley = new User();
        $fweasley->setLastname("Weasley");
        $fweasley->setFirstname("Fred");
        $fweasley->setEmail("fred.weasley@poudlard.com");
        $fweasley->setRoles(["ROLE_STUDENT"]);
        $fweasley->setImage("profiles/fweasley.jpg");
        $fweasley->setBirthday(new \DateTime('04/01/1978'));
        $fweasley->setPassword($this->passwordEncoder->encodePassword($fweasley, 'fred'));
        $fweasley->addSchool($school);
        $fweasley->addClassroom($gryffondorD);
        $users[] = $fweasley;
        $em->persist($fweasley);

        $ggoyle = new User();
        $ggoyle->setLastname("Goyle");
        $ggoyle->setFirstname("Gregory");
        $ggoyle->setEmail("gregory.goyle@poudlard.com");
        $ggoyle->setRoles(["ROLE_STUDENT"]);
        $ggoyle->setImage("");
        $ggoyle->setBirthday(new \DateTime('05/08/1979'));
        $ggoyle->setPassword($this->passwordEncoder->encodePassword($ggoyle, 'gregory'));
        $ggoyle->addSchool($school);
        $ggoyle->addClassroom($serpentardC);
        $users[] = $ggoyle;
        $em->persist($ggoyle);

        $gweasley = new User();
        $gweasley->setLastname("Weasley");
        $gweasley->setFirstname("Ginny");
        $gweasley->setEmail("ginny.weasley@poudlard.com");
        $gweasley->setRoles(["ROLE_STUDENT"]);
        $gweasley->setImage("profiles/gweasley.jpg");
        $gweasley->setBirthday(new \DateTime('08/11/1981'));
        $gweasley->setPassword($this->passwordEncoder->encodePassword($gweasley, 'ginny'));
        $gweasley->addSchool($school);
        $gweasley->addClassroom($gryffondorD);
        $users[] = $gweasley;
        $em->persist($gweasley);

        $habbot = new User();
        $habbot->setLastname("Abbot");
        $habbot->setFirstname("Hannah");
        $habbot->setEmail("hannah.abbot@poudlard.com");
        $habbot->setRoles(["ROLE_STUDENT"]);
        $habbot->setImage("");
        $habbot->setBirthday(new \DateTime('10/04/1979'));
        $habbot->setPassword($this->passwordEncoder->encodePassword($habbot, 'hannah'));
        $habbot->addSchool($school);
        $habbot->addClassroom($poufsouffleB);
        $users[] = $habbot;
        $em->persist($habbot);

        $hgranger = new User();
        $hgranger->setLastname("Granger");
        $hgranger->setFirstname("Hermione");
        $hgranger->setEmail("hermione.granger@poudlard.com");
        $hgranger->setRoles(["ROLE_STUDENT"]);
        $hgranger->setImage("profiles/hgranger.jpg");
        $hgranger->setBirthday(new \DateTime('09/19/1979'));
        $hgranger->setPassword($this->passwordEncoder->encodePassword($hgranger, 'hermione'));
        $hgranger->addSchool($school);
        $hgranger->addClassroom($gryffondorD);
        $users[] = $hgranger;
        $em->persist($hgranger);

        $hpotter = new User();
        $hpotter->setLastname("Potter");
        $hpotter->setFirstname("Harry");
        $hpotter->setEmail("harry.potter@poudlard.com");
        $hpotter->setRoles(["ROLE_STUDENT"]);
        $hpotter->setImage("profiles/hpotter.jpg");
        $hpotter->setBirthday(new \DateTime('07/31/1980'));
        $hpotter->setPassword($this->passwordEncoder->encodePassword($hpotter, 'harry'));
        $hpotter->addSchool($school);
        $hpotter->addClassroom($gryffondorD);
        $users[] = $hpotter;
        $em->persist($hpotter);

        $kbell = new User();
        $kbell->setLastname("Bell");
        $kbell->setFirstname("Katie");
        $kbell->setEmail("katie.bell@poudlard.com");
        $kbell->setRoles(["ROLE_STUDENT"]);
        $kbell->setImage("profiles/hpotter.jpg");
        $kbell->setBirthday(new \DateTime('05/21/1978'));
        $kbell->setPassword($this->passwordEncoder->encodePassword($kbell, 'katie'));
        $kbell->addSchool($school);
        $kbell->addClassroom($gryffondorD);
        $users[] = $kbell;
        $em->persist($kbell);

        $lbrown = new User();
        $lbrown->setLastname("Brown");
        $lbrown->setFirstname("Lavande");
        $lbrown->setEmail("lavande.brown@poudlard.com");
        $lbrown->setRoles(["ROLE_STUDENT"]);
        $lbrown->setImage("profiles/lbrown.jpg");
        $lbrown->setBirthday(new \DateTime('04/14/1980'));
        $lbrown->setPassword($this->passwordEncoder->encodePassword($lbrown, 'lavande'));
        $lbrown->addSchool($school);
        $lbrown->addClassroom($gryffondorD);
        $users[] = $lbrown;
        $em->persist($lbrown);

        $ljordan = new User();
        $ljordan->setLastname("Jordan");
        $ljordan->setFirstname("Lee");
        $ljordan->setEmail("lee.jordan@poudlard.com");
        $ljordan->setRoles(["ROLE_STUDENT"]);
        $ljordan->setImage("profiles/ljordan.jpg");
        $ljordan->setBirthday(new \DateTime('03/23/1978'));
        $ljordan->setPassword($this->passwordEncoder->encodePassword($ljordan, 'lee'));
        $ljordan->addSchool($school);
        $ljordan->addClassroom($gryffondorD);
        $users[] = $ljordan;
        $em->persist($ljordan);

        $llovegood = new User();
        $llovegood->setLastname("Lovegood");
        $llovegood->setFirstname("Luna");
        $llovegood->setEmail("luna.lovegood@poudlard.com");
        $llovegood->setRoles(["ROLE_STUDENT"]);
        $llovegood->setImage("profiles/llovegood.jpg");
        $llovegood->setBirthday(new \DateTime('02/13/1981'));
        $llovegood->setPassword($this->passwordEncoder->encodePassword($llovegood, 'luna'));
        $llovegood->addSchool($school);
        $llovegood->addClassroom($serdaigleA);
        $users[] = $llovegood;
        $em->persist($llovegood);

        $lturpin = new User();
        $lturpin->setLastname("Turpin");
        $lturpin->setFirstname("Lisa");
        $lturpin->setEmail("lisa.turpin@poudlard.com");
        $lturpin->setRoles(["ROLE_STUDENT"]);
        $lturpin->setImage("profiles/lturpin.jpg");
        $lturpin->setBirthday(new \DateTime('06/01/1979'));
        $lturpin->setPassword($this->passwordEncoder->encodePassword($lturpin, 'lisa'));
        $lturpin->addSchool($school);
        $lturpin->addClassroom($serdaigleA);
        $users[] = $lturpin;
        $em->persist($lturpin);

        $mbrocklehurst = new User();
        $mbrocklehurst->setLastname("Brocklehurst");
        $mbrocklehurst->setFirstname("Mandy");
        $mbrocklehurst->setEmail("mandy.brocklehurst@poudlard.com");
        $mbrocklehurst->setRoles(["ROLE_STUDENT"]);
        $mbrocklehurst->setImage("profiles/mbrocklehurst.png");
        $mbrocklehurst->setBirthday(new \DateTime('01/19/1979'));
        $mbrocklehurst->setPassword($this->passwordEncoder->encodePassword($mbrocklehurst, 'mandy'));
        $mbrocklehurst->addSchool($school);
        $mbrocklehurst->addClassroom($serdaigleA);
        $users[] = $mbrocklehurst;
        $em->persist($mbrocklehurst);

        $mcorner = new User();
        $mcorner->setLastname("Corner");
        $mcorner->setFirstname("Michael");
        $mcorner->setEmail("michael.corner@poudlard.com");
        $mcorner->setRoles(["ROLE_STUDENT"]);
        $mcorner->setImage("profiles/mcorner.jpg");
        $mcorner->setBirthday(new \DateTime('05/17/1980'));
        $mcorner->setPassword($this->passwordEncoder->encodePassword($mcorner, 'michael'));
        $mcorner->addSchool($school);
        $mcorner->addClassroom($serdaigleA);
        $users[] = $mcorner;
        $em->persist($mcorner);

        $medgecombe = new User();
        $medgecombe->setLastname("Edgecombe");
        $medgecombe->setFirstname("Marietta");
        $medgecombe->setEmail("marietta.edgecombe@poudlard.com");
        $medgecombe->setRoles(["ROLE_STUDENT"]);
        $medgecombe->setImage("profiles/medgecombe.jpg");
        $medgecombe->setBirthday(new \DateTime('10/23/1978'));
        $medgecombe->setPassword($this->passwordEncoder->encodePassword($medgecombe, 'marietta'));
        $medgecombe->addSchool($school);
        $medgecombe->addClassroom($serdaigleA);
        $users[] = $medgecombe;
        $em->persist($medgecombe);

        $mflint = new User();
        $mflint->setLastname("Flint");
        $mflint->setFirstname("Marcus");
        $mflint->setEmail("marcus.flint@poudlard.com");
        $mflint->setRoles(["ROLE_STUDENT"]);
        $mflint->setImage("");
        $mflint->setBirthday(new \DateTime('09/01/1974'));
        $mflint->setPassword($this->passwordEncoder->encodePassword($mflint, 'marcus'));
        $mflint->addSchool($school);
        $mflint->addClassroom($serpentardC);
        $users[] = $mflint;
        $em->persist($mflint);

        $nlondubat = new User();
        $nlondubat->setLastname("Londubat");
        $nlondubat->setFirstname("Neville");
        $nlondubat->setEmail("neville.londubat@poudlard.com");
        $nlondubat->setRoles(["ROLE_STUDENT"]);
        $nlondubat->setImage("profiles/nlondubat.jpg");
        $nlondubat->setBirthday(new \DateTime('07/30/1980'));
        $nlondubat->setPassword($this->passwordEncoder->encodePassword($nlondubat, 'neville'));
        $nlondubat->addSchool($school);
        $nlondubat->addClassroom($gryffondorD);
        $users[] = $nlondubat;
        $em->persist($nlondubat);

        $odubois = new User();
        $odubois->setLastname("Dubois");
        $odubois->setFirstname("Olivier");
        $odubois->setEmail("olivier.dubois@poudlard.com");
        $odubois->setRoles(["ROLE_STUDENT"]);
        $odubois->setImage("profiles/lbrown.jpg");
        $odubois->setBirthday(new \DateTime('11/17/1975'));
        $odubois->setPassword($this->passwordEncoder->encodePassword($odubois, 'olivier'));
        $odubois->addSchool($school);
        $odubois->addClassroom($gryffondorD);
        $users[] = $odubois;
        $em->persist($odubois);

        $oquirke = new User();
        $oquirke->setLastname("Quirke");
        $oquirke->setFirstname("Orla");
        $oquirke->setEmail("orla.quirke@poudlard.com");
        $oquirke->setRoles(["ROLE_STUDENT"]);
        $oquirke->setImage("");
        $oquirke->setBirthday(new \DateTime('03/27/1982'));
        $oquirke->setPassword($this->passwordEncoder->encodePassword($oquirke, 'orla'));
        $oquirke->addSchool($school);
        $oquirke->addClassroom($serdaigleA);
        $users[] = $oquirke;
        $em->persist($oquirke);

        $pdeauclaire = new User();
        $pdeauclaire->setLastname("Deauclaire");
        $pdeauclaire->setFirstname("Pénélope");
        $pdeauclaire->setEmail("penelope.deauclaire@poudlard.com");
        $pdeauclaire->setRoles(["ROLE_STUDENT"]);
        $pdeauclaire->setImage("profiles/pdeauclaire.jpg");
        $pdeauclaire->setBirthday(new \DateTime('01/17/1975'));
        $pdeauclaire->setPassword($this->passwordEncoder->encodePassword($pdeauclaire, 'penelope'));
        $pdeauclaire->addSchool($school);
        $pdeauclaire->addClassroom($serdaigleA);
        $users[] = $pdeauclaire;
        $em->persist($pdeauclaire);

        $phaywood = new User();
        $phaywood->setLastname("Haywood");
        $phaywood->setFirstname("Penny");
        $phaywood->setEmail("penny.haywood@poudlard.com");
        $phaywood->setRoles(["ROLE_STUDENT"]);
        $phaywood->setImage("");
        $phaywood->setBirthday(new \DateTime('09/14/1972'));
        $phaywood->setPassword($this->passwordEncoder->encodePassword($phaywood, 'penny'));
        $phaywood->addSchool($school);
        $phaywood->addClassroom($poufsouffleB);
        $users[] = $phaywood;
        $em->persist($phaywood);

        $ppatil = new User();
        $ppatil->setLastname("Patil");
        $ppatil->setFirstname("Padma");
        $ppatil->setEmail("padma.patil@poudlard.com");
        $ppatil->setRoles(["ROLE_STUDENT"]);
        $ppatil->setImage("profiles/ppatil.png");
        $ppatil->setBirthday(new \DateTime('11/12/1980'));
        $ppatil->setPassword($this->passwordEncoder->encodePassword($ppatil, 'padma'));
        $ppatil->addSchool($school);
        $ppatil->addClassroom($serdaigleA);
        $users[] = $ppatil;
        $em->persist($ppatil);

        $rdavies = new User();
        $rdavies->setLastname("Davies");
        $rdavies->setFirstname("Roger");
        $rdavies->setEmail("roger.davies@poudlard.com");
        $rdavies->setRoles(["ROLE_STUDENT"]);
        $rdavies->setImage("profiles/rdavies.jpg");
        $rdavies->setBirthday(new \DateTime('10/23/1978'));
        $rdavies->setPassword($this->passwordEncoder->encodePassword($rdavies, 'roger'));
        $rdavies->addSchool($school);
        $rdavies->addClassroom($serdaigleA);
        $users[] = $rdavies;
        $em->persist($rdavies);

        $rhilliard = new User();
        $rhilliard->setLastname("Hilliard");
        $rhilliard->setFirstname("Robert");
        $rhilliard->setEmail("robert.hilliard@poudlard.com");
        $rhilliard->setRoles(["ROLE_STUDENT"]);
        $rhilliard->setImage("");
        $rhilliard->setBirthday(new \DateTime('08/14/1978'));
        $rhilliard->setPassword($this->passwordEncoder->encodePassword($rhilliard, 'robert'));
        $rhilliard->addSchool($school);
        $rhilliard->addClassroom($serdaigleA);
        $users[] = $rhilliard;
        $em->persist($rhilliard);

        $rweasley = new User();
        $rweasley->setLastname("Weasley");
        $rweasley->setFirstname("Ron");
        $rweasley->setEmail("ron.weasley@poudlard.com");
        $rweasley->setRoles(["ROLE_STUDENT"]);
        $rweasley->setImage("profiles/rweasley.jpg");
        $rweasley->setBirthday(new \DateTime('03/01/1980'));
        $rweasley->setPassword($this->passwordEncoder->encodePassword($rweasley, 'ron'));
        $rweasley->addSchool($school);
        $rweasley->addClassroom($gryffondorD);
        $users[] = $rweasley;
        $em->persist($rweasley);

        $sbones = new User();
        $sbones->setLastname("Bones");
        $sbones->setFirstname("Susan");
        $sbones->setEmail("susan.bones@poudlard.com");
        $sbones->setRoles(["ROLE_STUDENT"]);
        $sbones->setImage("");
        $sbones->setBirthday(new \DateTime('11/11/1980'));
        $sbones->setPassword($this->passwordEncoder->encodePassword($sbones, 'susan'));
        $sbones->addSchool($school);
        $sbones->addClassroom($poufsouffleB);
        $users[] = $sbones;
        $em->persist($sbones);

        $tboot = new User();
        $tboot->setLastname("Boot");
        $tboot->setFirstname("Terry");
        $tboot->setEmail("terry.boot@poudlard.com");
        $tboot->setRoles(["ROLE_STUDENT"]);
        $tboot->setImage("profiles/tboot.jpg");
        $tboot->setBirthday(new \DateTime('08/08/1980'));
        $tboot->setPassword($this->passwordEncoder->encodePassword($tboot, 'terry'));
        $tboot->addSchool($school);
        $tboot->addClassroom($serdaigleA);
        $users[] = $tboot;
        $em->persist($tboot);

        $tjedusor = new User();
        $tjedusor->setLastname("Jedusor");
        $tjedusor->setFirstname("Tom");
        $tjedusor->setEmail("tom.jedusor@poudlard.com");
        $tjedusor->setRoles(["ROLE_STUDENT"]);
        $tjedusor->setImage("");
        $tjedusor->setBirthday(new \DateTime('12/31/1926'));
        $tjedusor->setPassword($this->passwordEncoder->encodePassword($tjedusor, 'yom'));
        $tjedusor->addSchool($school);
        $tjedusor->addClassroom($serpentardC);
        $users[] = $tjedusor;
        $em->persist($tjedusor);

        $vcrabbe = new User();
        $vcrabbe->setLastname("Crabbe");
        $vcrabbe->setFirstname("Vincent");
        $vcrabbe->setEmail("vincent.crabbe@poudlard.com");
        $vcrabbe->setRoles(["ROLE_STUDENT"]);
        $vcrabbe->setImage("");
        $vcrabbe->setBirthday(new \DateTime('05/02/1979'));
        $vcrabbe->setPassword($this->passwordEncoder->encodePassword($vcrabbe, 'vincent'));
        $vcrabbe->addSchool($school);
        $vcrabbe->addClassroom($serpentardC);
        $users[] = $vcrabbe;
        $em->persist($vcrabbe);

        // OPINIONS

        $opinion1 = new Opinion();
        $opinion1->setContent("Si spectare poterat volucriter fabulae spectare multas licet flexeris nixus fabulae gyris suppetere usque nupsissent.");
        $opinion1->setDate(new \DateTime('10/30/2019'));
        $opinion1->setUser($oquirke);
        $opinions[] = $opinion1;
        $em->persist($opinion1);

        $opinion2 = new Opinion();
        $opinion2->setContent("Quarum incrementis defuisset quarum plerumque atque Fortuna Roma non venerat summitatem foedere sublimibus in dissidentes.");
        $opinion2->setDate(new \DateTime('06/01/2020'));
        $opinion2->setUser($hpotter);
        $opinions[] = $opinion2;
        $em->persist($opinion2);

        $opinion3 = new Opinion();
        $opinion3->setContent("Inpulsu funesti principem inpulsu nondum comitatum carnificis adulescens ut ex adulescens manu et et hos.");
        $opinion3->setDate(new \DateTime('01/14/2018'));
        $opinion3->setUser($rweasley);
        $opinions[] = $opinion3;
        $em->persist($opinion3);

        // RESSOURCES
  
        $ressource1 = new Ressource();
        $ressource1->setTitle("Boggarts lavender robes");
        $ressource1->setContent("Red hair crookshanks bludger Marauder’s Map Prongs sunshine daisies butter mellow Ludo Bagman. Beaters gobbledegook N.E.W.T., Honeydukes eriseD inferi Wormtail.");
        $ressource1->setPath("");
        $ressource1->setClassroom($serdaigleA);
        $ressource1->setUser($binns);
        $ressources[] = $ressource1;
        $em->persist($ressource1);

        $ressource2 = new Ressource();
        $ressource2->setTitle("Squashy armchairs dirt on your nose brass");
        $ressource2->setContent("Prefect’s bathroom Trelawney veela squashy armchairs, SPEW: Gamp’s Elemental Law of Transfiguration. Magic Nagini bezoar, Hippogriffs Headless Hunt giant squid petrified. Beuxbatons flying half-blood revision schedule,");
        $ressource2->setPath("manuels.jpeg");
        $ressource2->setClassroom($gryffondorD);
        $ressource2->setUser($mcgonagall);
        $ressources[] = $ressource2;
        $em->persist($ressource2);

        $ressource3 = new Ressource();
        $ressource3->setTitle("Thestral dirigible plums");
        $ressource3->setContent("Red hair crookshanks bludger Marauder’s Map Prongs sunshine daisies butter mellow Ludo Bagman. Beaters gobbledegook N.E.W.T., Honeydukes eriseD inferi Wormtail. Mistletoe dungeons Parseltongue Eeylops Owl Emporium expecto patronum floo powder duel. Gillyweed portkey,");
        $ressource3->setPath("manuels.jpeg");
        $ressource3->setClassroom($gryffondorD);
        $ressource3->setUser($mcgonagall);
        $ressources[] = $ressource3;
        $em->persist($ressource3);

        $ressource4 = new Ressource();
        $ressource4->setTitle("Alohamora wand elf parchment");
        $ressource4->setContent("Snape centaur portkey ghost Hermione spell bezoar Scabbers. Peruvian-Night-Powder werewolf, Dobby pear-tickle half-moon-glasses, Knight-Bus. Padfoot snargaluff seeker: Hagrid broomstick mischief managed. Snitch Fluffy rock-cake,");
        $ressource4->setPath("manuels.jpeg");
        $ressource4->setClassroom($gryffondorD);
        $ressource4->setUser($rogue);
        $ressources[] = $ressource4;
        $em->persist($ressource4);

        $ressource5 = new Ressource();
        $ressource5->setTitle("Squashy armchairs dirt on your nose brass scales");
        $ressource5->setContent("Prefect’s bathroom Trelawney veela squashy armchairs, SPEW: Gamp’s Elemental Law of Transfiguration. Magic Nagini bezoar,");
        $ressource5->setPath("manuels.jpeg");
        $ressource5->setClassroom($serpentardC);
        $ressource5->setUser($rogue);
        $ressources[] = $ressource5;
        $em->persist($ressource5);

        $ressource6 = new Ressource();
        $ressource6->setTitle("Palominos scarlet train black robes, Metamorphimagus Niffler dead easy second bedroom.");
        $ressource6->setContent("halice Hungarian Horntail, catherine wheels Essence of Dittany Gringotts Harry Potter. Prophecies Yaxley green eyes Remembrall horcrux hand of the servant. Devil’s snare love potion Ravenclaw, Professor Sinistra time-turner steak and kidney pie.");
        $ressource6->setPath("manuels.jpeg");
        $ressource6->setClassroom($poufsouffleB);
        $ressource6->setUser($lupin);
        $ressources[] = $ressource6;
        $em->persist($ressource6);
      
        // NEWS

        $news1 = new News();
        $news1->setTitle("A quand O'shcool ?");
        $news1->setContent("Advenit post multos Scudilo Scutariorum tribunus velamento subagrestis ingenii persuasionis opifex callidus. qui eum adulabili sermone seriis admixto solus omnium proficisci pellexit vultu adsimulato saepius replicando quod flagrantibus votis eum videre frater cuperet patruelis, siquid per inprudentiam gestum est remissurus ut mitis et clemens, participemque eum suae maiestatis adscisceret, futurum laborum quoque socium, quos Arctoae provinciae diu fessae poscebant.");
        $news1->setDate(new \DateTime('05/29/2020'));
        $news1->setSchool($oschool);
        $news[] = $news1;
        $em->persist($news1);

        $news2 = new News();
        $news2->setTitle("Du nouveau !");
        $news2->setContent("Sed quid est quod in hac causa maxime homines admirentur et reprehendant meum consilium, cum ego idem antea multa decreverim, que magis ad hominis dignitatem quam ad rei publicae necessitatem pertinerent? Supplicationem quindecim dierum decrevi sententia mea. Rei publicae satis erat tot dierum quot C. Mario ; dis immortalibus non erat exigua eadem gratulatio quae ex maximis bellis. Ergo ille cumulus dierum hominis est dignitati tributus.");
        $news2->setPath("news1.jpg");
        $news2->setDate(new \DateTime('06/01/2020'));
        $news2->setSchool($oschool);
        $news[] = $news2;
        $em->persist($news2);

        $news6 = new News();
        $news6->setTitle("Bientôt chez vous !");
        $news6->setContent("Prefect’s bathroom Trelawney veela squashy armchairs, SPEW: Gamp’s Elemental Law of Transfiguration. Magic Nagini bezoar, Hippogriffs Headless Hunt giant squid petrified. Beuxbatons flying half-blood revision schedule, Great Hall aurors Minerva McGonagall Polyjuice Potion");
        $news6->setPath("news1.jpg");
        $news6->setDate(new \DateTime('06/07/2020'));
        $news6->setSchool($oschool);
        $news[] = $news6;
        $em->persist($news6);

        $news7 = new News();
        $news7->setTitle("Faites attention à vous");
        $news7->setContent("Red hair crookshanks bludger Marauder’s Map Prongs sunshine daisies butter mellow Ludo Bagman. Beaters gobbledegook N.E.W.T., Honeydukes eriseD inferi Wormtail. Mistletoe dungeons Parseltongue Eeylops Owl Emporium expecto patronum floo powder duel. Gillyweed portkey, keeper Godric’s Hollow telescope,");
        $news7->setPath("news1.jpg");
        $news7->setDate(new \DateTime('03/22/2020'));
        $news7->setSchool($oschool);
        $news[] = $news7;
        $em->persist($news7);

        $news3 = new News();
        $news3->setTitle("Quoi de neuf ?");
        $news3->setContent("Praesent viverra fermentum nunc, in tempus dolor tincidunt at. Nullam tempor condimentum turpis, eget luctus arcu ornare eget. Integer ut lorem in urna vestibulum volutpat. Ut ac venenatis ipsum. Nam.");
        $news3->setPath("news1.jpg");
        $news3->setDate(new \DateTime('06/05/2020'));
        $news3->setSchool($school);
        $news[] = $news3;
        $em->persist($news3);

        $news4 = new News();
        $news4->setTitle("Date de rentrée");
        $news4->setContent("Vivamus auctor a ligula sit amet maximus. Curabitur congue risus quis turpis semper, et finibus sapien feugiat. Vestibulum vitae arcu eros. Donec ac dui molestie, hendrerit diam eu, blandit neque. Nunc nec scelerisque tortor. Proin congue ex est, varius mattis nulla sollicitudin eu. Sed augue.");
        $news4->setPath("news1.jpg");
        $news4->setDate(new \DateTime('08/24/2019'));
        $news4->setSchool($school);
        $news[] = $news4;
        $em->persist($news4);

        $news5 = new News();
        $news5->setTitle("Rencontre avec le choixpeau");
        $news5->setContent("Aliquam ornare augue ligula, et lobortis est dapibus at. Duis sit amet eros mollis, congue magna sit amet, euismod elit. Fusce laoreet felis non consectetur tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis condimentum egestas nisi, dictum porta nulla. Morbi rhoncus rhoncus urna non sagittis. Nulla sed accumsan metus. Proin semper massa quam, in bibendum arcu pulvinar vel.");
        $news5->setPath("news1.jpg");
        $news5->setDate(new \DateTime('09/03/2020'));
        $news5->setSchool($school);
        $news[] = $news5;
        $em->persist($news5);

        $news8 = new News();
        $news8->setTitle("Tournoi de Quidditch de fin");
        $news8->setContent("Squashy armchairs dirt on your nose brass scales crush the Sopophorous bean with flat side of silver dagger, releases juice better than cutting. Full moon Whomping Willow three turns should do it lemon drops. Locomotor trunks owl treats that will be 50 points, Mr. Potter. Witch Weekly, he will rise again and he will come for us, headmaster Erumpent horn.");
        $news8->setPath("news1.jpg");
        $news8->setDate(new \DateTime('06/23/2019'));
        $news8->setSchool($school);
        $news[] = $news8;
        $em->persist($news8);

        $news9 = new News();
        $news9->setTitle("Résultats du tournoi de Quidditch");
        $news9->setContent("Thestral dirigible plums, Viktor Krum hexed memory charm Animagus Invisibility Cloak three-headed Dog. Half-Blood Prince Invisibility Cloak cauldron cakes, hiya Harry! Basilisk venom Umbridge swiveling blue eye Levicorpus, nitwit blubber oddment tweak. Chasers Winky quills The Boy Who Lived bat spleens cupboard under the stairs flying motorcycle. Sirius Black Holyhead Harpies, you’ve got dirt on your nose.");
        $news9->setPath("news1.jpg");
        $news9->setDate(new \DateTime('06/30/2019'));
        $news9->setSchool($school);
        $news[] = $news9;
        $em->persist($news9);
      
        // NOTICES

        $notice1 = new Notice();
        $notice1->setTitle("North bastard tourney Renly bastard");
        $notice1->setContent("Nightswatch bastard raven Tarly Nightswatch maester Wildlings Stannis of riverlands raven Tully Winterfell Stannis Littlefinger Barratheon raven Tarly Tarly duel");
        $notice1->setStatus(0);
        $notice1->setAuthor($mcgonagall);
        $notice1->setReceiver($hpotter);
        $notices[] = $notice1;
        $em->persist($notice1);

        $notice2 = new Notice();
        $notice2->setTitle("Direwolf Stannis in Dragon Stark.");
        $notice2->setContent("Raven Dorne Winterfell Littlefinger Kingslanding the Kingslanding oath Littlefinger raven the Kingslanding of Barratheon raven Dorne giantsblood Winterfell Tully the");
        $notice2->setStatus(0);
        $notice2->setAuthor($chourave);
        $notice2->setReceiver($llovegood);
        $notices[] = $notice2;
        $em->persist($notice2);

        $notice3 = new Notice();
        $notice3->setTitle("Giantsblood white walkers white walkers giantsblood Dragon.");
        $notice3->setContent("Bastard Karstark Dragon Tarly oath Renly Melisandre south maester Wildlings bastard kingsblood the Karstark white walkers Kingslanding Stannis Stark Casterly rock Kingslanding");
        $notice3->setStatus(0);
        $notice3->setAuthor($rogue);
        $notice3->setReceiver($rweasley);
        $notices[] = $notice3;
        $em->persist($notice3);

        // LESSONS

        $lesson1 = new Lesson();
        $lesson1->setTitle("North Lannister Nightswatch Kingslanding oath Stark giantsblood of.");
        $lesson1->setContent("All men must die. All men must die. Can a man still be brave if he’s afraid? That is the only time a man can be brave.More pigeon pie, please. The North remembers. As High as Honor. The Knight of Lemonwood.");
        $lesson1->setPath("");
        $lesson1->setClassroom($gryffondorD);
        $lesson1->setSubject($potions);
        $lesson1->setUser($rogue);
        $lessons[] = $lesson1;
        $em->persist($lesson1);

        $lesson2 = new Lesson();
        $lesson2->setTitle("Nightswatch maester Kingslanding Casterly rock south.");
        $lesson2->setContent("Words are like wind. The War of the 5 kings. The wolf and the lion. A dream of Spring. More pigeon pie, please.");
        $lesson2->setPath("manuels.jpeg");
        $lesson2->setClassroom($serdaigleA);
        $lesson2->setSubject($histoire);
        $lesson2->setUser($binns);
        $lessons[] = $lesson2;
        $em->persist($lesson2);

        $lesson3 = new Lesson();
        $lesson3->setTitle("Giantsblood north Winterfell Kingslanding south.");
        $lesson3->setContent("The North remembers. And now his watch is ended. House Tarly of Horn Hill The tourney of Ashford Meadows. The battle of the redgrass field.");
        $lesson3->setPath("");
        $lesson3->setClassroom($serdaigleA);
        $lesson3->setSubject($moldus);
        $lesson3->setUser($burbage);
        $lessons[] = $lesson3;
        $em->persist($lesson3);

        $lesson4 = new Lesson();
        $lesson4->setTitle("Riverlands warden Karstark Dorne tourney.");
        $lesson4->setContent("Pay the iron price. The North remembers. It is rare to meet a Lannister who shares my enthusiasm for dead Lannisters. The Dothraki do things in their own time, for their own reasons. Bastards are born of passion, aren't they? We don't despise them in Dorne.");
        $lesson4->setPath("manuels.jpeg");
        $lesson4->setClassroom($gryffondorD);
        $lesson4->setSubject($metamarphose);
        $lesson4->setUser($mcgonagall);
        $lessons[] = $lesson4;
        $em->persist($lesson4);

        $lesson5 = new Lesson();
        $lesson5->setTitle("Stannis in Nightswatch Dragon Dorne.");
        $lesson5->setContent("Our Sun Shines Bright. The tourney of Ashford Meadows. The War of the 5 kings. The Knight of Lemonwood. The rains of castamere.");
        $lesson5->setPath("manuels.jpeg");
        $lesson5->setClassroom($gryffondorD);
        $lesson5->setSubject($sortileges);
        $lesson5->setUser($flitwick);
        $lessons[] = $lesson5;
        $em->persist($lesson5);

        $lesson6 = new Lesson();
        $lesson6->setTitle("Alohamora wand elf parchment,");
        $lesson6->setContent("Wingardium Leviosa hippogriff, house dementors betrayal. Holly, Snape centaur portkey ghost Hermione spell bezoar Scabbers. Peruvian-Night-Powder werewolf, Dobby pear-tickle half-moon-glasses, Knight-Bus. Padfoot snargaluff seeker: Hagrid broomstick mischief managed. ");
        $lesson6->setPath("manuels.jpeg");
        $lesson6->setClassroom($serpentardC);
        $lesson6->setSubject($sciences);
        $lesson6->setUser($ombrage);
        $lessons[] = $lesson6;
        $em->persist($lesson6);

        $lesson7 = new Lesson();
        $lesson7->setTitle("Toad-like smile Flourish and Blotts");
        $lesson7->setContent("Fat Lady baubles banana fritters fairy lights Petrificus Totalus. So thirsty, deluminator firs’ years follow me 12 inches of parchment. Head Boy start-of-term banquet Cleansweep Seven roaring lion hat. Unicorn blood crossbow mars is bright tonight,");
        $lesson7->setPath("manuels.jpeg");
        $lesson7->setClassroom($gryffondorD);
        $lesson7->setSubject($metamarphose);
        $lesson7->setUser($mcgonagall);
        $lessons[] = $lesson7;
        $em->persist($lesson7);

        $lesson8 = new Lesson();
        $lesson8->setTitle("Prefect’s bathroom Trelawney veela squashy armchairs,");
        $lesson8->setContent("Hippogriffs Headless Hunt giant squid petrified. Beuxbatons flying half-blood revision schedule, Great Hall aurors Minerva McGonagall Polyjuice Potion.");
        $lesson8->setPath("manuels.jpeg");
        $lesson8->setClassroom($gryffondorD);
        $lesson8->setSubject($potions);
        $lesson8->setUser($rogue);
        $lessons[] = $lesson8;
        $em->persist($lesson8);

        $lesson9 = new Lesson();
        $lesson9->setTitle("Half-giant jinxes peg-leg gillywater broken glasses large black dog Great Hall");
        $lesson9->setContent("Nearly-Headless Nick now string them together, and answer me this, which creature would you be unwilling to kiss? Poltergeist sticking charm, troll umbrella stand flying cars golden locket Lily Potter. Pumpkin juice Trevor wave your wand out glass orbs, a Grim knitted hats. Stan Shunpike doe patronus, suck his soul Muggle-Born large order of drills the trace.");
        $lesson9->setPath("manuels.jpeg");
        $lesson9->setClassroom($gryffondorD);
        $lesson9->setSubject($potions);
        $lesson9->setUser($rogue);
        $lessons[] = $lesson9;
        $em->persist($lesson9);

        $lesson10 = new Lesson();
        $lesson10->setTitle("Alohamora wand elf parchment");
        $lesson10->setContent(" Wingardium Leviosa hippogriff, house dementors betrayal. Holly, Snape centaur portkey ghost Hermione spell bezoar Scabbers. Peruvian-Night-Powder werewolf, Dobby pear-tickle half-moon-glasses, Knight-Bus.");
        $lesson10->setPath("manuels.jpeg");
        $lesson10->setClassroom($poufsouffleB);
        $lesson10->setSubject($sport);
        $lesson10->setUser($hagrid);
        $lessons[] = $lesson10;
        $em->persist($lesson10);


        // HOMEWORK

        $homework1 = new Homework();
        $homework1->setCode("P-GD-1");
        $homework1->setTitle("Devoir n°1");
        $homework1->setContent("Ce devoir est à rendre pour le 10 juin 2020, faite le avec soin, il sera noté");
        $homework1->setPath("homework/potion-d1-ennonce.txt");
        $homework1->setClassroom($gryffondorD);
        $homework1->setUser($rogue);
        $homework1->setSubject($potions);
        $homeworks[] = $homework1;
        $em->persist($homework1);

        $homework2 = new Homework();
        $homework2->setCode("M-GR-1");
        $homework2->setTitle("Controle n°1");
        $homework2->setContent("Disertation sur : l'art de la méthamorphose. A rendre pour le 3 juin 2020");
        $homework2->setPath("");
        $homework2->setClassroom($gryffondorD);
        $homework2->setUser($mcgonagall);
        $homework2->setSubject($metamarphose);
        $homeworks[] = $homework2;
        $em->persist($homework2);

        $homework4 = new Homework();
        $homework4->setCode("P-GD-2");
        $homework4->setTitle("Devoir n°2");
        $homework4->setContent("Ce devoir est à rendre pour le 24 juin 2020, faites le avec soin, il sera noté");
        $homework4->setPath("homework/potion-d2-ennonce.txt");
        $homework4->setClassroom($gryffondorD);
        $homework4->setUser($rogue);
        $homework4->setSubject($potions);
        $homeworks[] = $homework4;
        $em->persist($homework4);

        $homework5 = new Homework();
        $homework5->setCode("P-SP-1");
        $homework5->setTitle("Devoir n°1");
        $homework5->setContent("Ce devoir est à rendre pour le 12 Juin 2020, faites le avec soin, il sera noté");
        $homework5->setPath("homework/potion-d1-serp-ennonce.txt");
        $homework5->setClassroom($serpentardC);
        $homework5->setUser($rogue);
        $homework5->setSubject($potions);
        $homeworks[] = $homework5;
        $em->persist($homework5);

        $homework3 = new Homework();
        $homework3->setCode("P-GD-1");
        $homework3->setTitle("Devoir n°1 rendu");
        $homework3->setStatus(1);
        $homework3->setContent("Merci de corriger mon devoir Monsieur Rogue");
        $homework3->setPath("homework/potion-d1-granger.txt");
        $homework3->setClassroom($gryffondorD);
        $homework3->setUser($hgranger);
        $homework3->setSubject($potions);
        $homeworks[] = $homework3;
        $em->persist($homework3);

        $homework6 = new Homework();
        $homework6->setCode("P-GD-1");
        $homework6->setTitle("Devoir n°1 rendu");
        $homework6->setStatus(1);
        $homework6->setContent("Merci de corriger mon devoir Monsieur Rogue");
        $homework6->setPath("homework/potion-d1-potter.txt");
        $homework6->setClassroom($gryffondorD);
        $homework6->setUser($hpotter);
        $homework6->setSubject($potions);
        $homeworks[] = $homework6;
        $em->persist($homework6);

        $homework7 = new Homework();
        $homework7->setCode("P-SP-1");
        $homework7->setTitle("Devoir n°1 rendu");
        $homework7->setStatus(1);
        $homework7->setContent("Merci de corriger mon devoir Monsieur Rogue");
        $homework7->setPath("homework/potion-d1-sp-malefoy.txt");
        $homework7->setClassroom($serpentardC);
        $homework7->setUser($dmalefoy);
        $homework7->setSubject($potions);
        $homeworks[] = $homework7;
        $em->persist($homework7);

        $homework8 = new Homework();
        $homework8->setCode("M-GD-1");
        $homework8->setTitle("Devoir n°1 rendu");
        $homework8->setStatus(1);
        $homework8->setContent("Merci de corriger mon devoir Madame");
        $homework8->setPath("homework/meta-d1-weasley.txt");
        $homework8->setClassroom($gryffondorD);
        $homework8->setUser($rweasley);
        $homework8->setSubject($metamarphose);
        $homeworks[] = $homework8;
        $em->persist($homework8);

        $homework9 = new Homework();
        $homework9->setCode("M-GD-1");
        $homework9->setTitle("Devoir n°1 rendu");
        $homework9->setStatus(1);
        $homework9->setContent("Merci de corriger mon devoir Madame");
        $homework9->setPath("homework/meta-d1-granger.txt");
        $homework9->setClassroom($gryffondorD);
        $homework9->setUser($hgranger);
        $homework9->setSubject($metamarphose);
        $homeworks[] = $homework9;
        $em->persist($homework9);

        // GRADES

        $grade1 = new Grade();
        $grade1->setTitle("Devoir 1 de potion");
        $grade1->setGrade(18);
        $grade1->setContent("Très bon travail, continuez comme ça Miss Granger");
        $grade1->setHomework($homework3);
        $homework3->setStatus(2);
        $homework3->setCorrectionPath("homework/potion-d1-granger-correction.txt");
        $grades[] = $grade1;
        $em->persist($grade1);

        $grade2 = new Grade();
        $grade2->setTitle("Devoir 1 de potion");
        $grade2->setGrade(9);
        $grade2->setContent("Travail moyen. Il va falloir se ressaisir Drago");
        $grade2->setHomework($homework7);
        $homework7->setStatus(2);
        $homework7->setCorrectionPath("homework/potion-d1-sp-malefoy-correction.txt");
        $grades[] = $grade2;
        $em->persist($grade2);

        $grade3 = new Grade();
        $grade3->setTitle("Devoir 1 de potion");
        $grade3->setGrade(20);
        $grade3->setContent("Excellent travail");
        $grade3->setHomework($homework6);
        $homework6->setStatus(2);
        $homework6->setCorrectionPath("homework/potion-d1-potter-correction.txt");
        $grades[] = $grade3;
        $em->persist($grade3);

        $grade4 = new Grade();
        $grade4->setTitle("Devoir 1 de Métamorphose");
        $grade4->setGrade(17);
        $grade4->setContent("Très bon devoir");
        $grade4->setHomework($homework9);
        $homework9->setStatus(2);
        $homework9->setCorrectionPath("homework/meta-d1-granger-correction.txt");
        $grades[] = $grade4;
        $em->persist($grade4);

        // FLUSH

        $em->flush();
    }
}