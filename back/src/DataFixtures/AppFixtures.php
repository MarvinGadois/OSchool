<?php

namespace App\DataFixtures;

use App\Entity\Classroom;
use App\Entity\Opinion;
use App\Entity\Ressource;
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
        $opinions = [];
        $ressources = [];
        $news = [];



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
        
        // USER TEACHER

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


        $em->flush();
    }
}