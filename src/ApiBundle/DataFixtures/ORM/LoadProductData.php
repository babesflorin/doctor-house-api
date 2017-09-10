<?php

namespace ApiBundle\DataFixtures\ORM;

use ApiBundle\Entity\Category;
use ApiBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProductData  extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $categories = $manager->getRepository(Category::class)->findAll();

        $manager->persist(
            (new Product())
                ->setName('Masina de spalat rufe Slim Beko WKB61032Y, 6 kg, 1000 RPM, Clasa A++, LED, Alb')
                ->setDescription('Sistemul Aquafusion patentat de Beko valorifica la maxim consumul de APA, ENERGIE si DETERGENT in timpul spalarii. Astfel, poate fi economisita anual o cantitate de 5,5 kg de detergent, ceea ce inseamna  rufe mai curate cu un consum minim de resurse.')
                ->setPrice(879.99)
                ->setCategory($categories[0])
                ->setImage('http://cdn.ziwind.com/images/masina_de_spalat.jpg')
                ->setModelObject(null)
                ->setModelTexture(null)
        );

        $manager->persist(
            (new Product())
                ->setName('Cuptor electric Miele H 6461 BP cu comenzi tactile intuitive si functie Umiditate plus pt. rezultate perfecte')
                ->setDescription('Cuptor de perete incorporat')
                ->setPrice(10085.00)
                ->setCategory($categories[2])
                ->setImage('http://cdn.ziwind.com/images/cuptor_electric.jpg')
                ->setModelObject(null)
                ->setModelTexture(null)
        );

        $manager->persist(
            (new Product())
                ->setName('Cuptor cu microunde Beko MWC2000MW, 20 l, 700 W, Mecanic, Alb')
                ->setDescription('Functia Grill reprezinta solutia ideala pentru pregatirea carnii sau rumenirea la suprafata a alimentelor.')
                ->setPrice(339.42)
                ->setCategory($categories[2])
                ->setImage('http://cdn.ziwind.com/images/microunde.jpg')
                ->setModelObject('microwave.obj')
                ->setModelTexture('microwaveMap.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Aragaz Zanussi ZCG210M1WA, Gaz, 4 Arzatoare, Siguranta plita/cuptor, 50 cm, Alb')
                ->setDescription('Daca aveti probleme cu spatiul din bucatarie, acest aragaz va ajuta sa nu faceti compromisuri in ceea ce priveste optiunile la gatit. Formatul sau ingust asigura potrivirea usoara in orice loc din bucataria dumneavoastra, insa ofera acelasi spatiu la interior si functii de gatit ca un aragaz standard.')
                ->setPrice(699.99)
                ->setCategory($categories[2])
                ->setImage('http://cdn.ziwind.com/images/aragaz.jpg')
                ->setModelObject('oven-model.obj')
                ->setModelTexture('oven-model.png')
        );

        $manager->persist(
            (new Product())
                ->setName('Scaun living Kring Kai, PP si lemn, Rosu')
                ->setDescription('Scaun living Kring Kai, PP si lemn, Rosu. In amenajarea spatiului de dining iti poti lasa imaginatia libera si poti crea un décor indraznet si personal.')
                ->setPrice(139.99)
                ->setCategory($categories[4])
                ->setImage('http://cdn.ziwind.com/images/scaun.jpg')
                ->setModelObject(null)
                ->setModelTexture(null)
        );

        $manager->persist(
            (new Product())
                ->setName('Televizor LED Samsung, 80 cm, 32J4000, HD')
                ->setDescription('Utilizand un algoritm avansat de imbunatatire a calitatii imaginilor, functia Wide Colour Enhancer de la Samsung imbunatateste calitatea imaginilor si reda pana si cele mai mici detalii. Acum puteti vedea culori mult mai vii, cu Wide Colour Enhancer.')
                ->setPrice(799.99)
                ->setCategory($categories[5])
                ->setImage('http://cdn.ziwind.com/images/tv1.jpg')
                ->setModelObject('tv.obj')
                ->setModelTexture('tvCase.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Televizor LED Game TV LG, 80 cm, 32LH510B, HD')
                ->setDescription('Cea mai noua si avansata tehnologie LG, Triple XD Engine, ofera cel mai inalt grad de excelenta in privinta culorii, contrastului si claritatii, pentru cea mai buna calitate a imaginii si performanta.')
                ->setPrice(949.99)
                ->setCategory($categories[5])
                ->setImage('http://cdn.ziwind.com/images/tv2.jpg')
                ->setModelObject(null)
                ->setModelTexture(null)
        );

        $manager->persist(
            (new Product())
                ->setName('Pat Dormitor 2 persoane Coral, Pal Melaminat 16 mm, Stejar Ferrara/Rift')
                ->setDescription('Diferentiat printr-o cromatica sobra, patul Coral este piesa de mobilier potrivita persoanelor ce isi doresc un dormitor cat mai aerisit si modern.')
                ->setPrice(408.97)
                ->setCategory($categories[6])
                ->setImage('http://cdn.ziwind.com/images/bed.jpg')
                ->setModelObject('bed.obj')
                ->setModelTexture('bed.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Noptiera May, Tvilum 1 sertar, 38 x 30 x 48 cm')
                ->setDescription('Gama May produsa exclusiv de Tvilum,Danemarca,lider European in furnizarea de mobilier practic si functional ,cu un raport excelent calitate/ pret ,va ofera comode si noptiere perfecte pentru orice dormitor.Sertarele sunt prevazute cu manere elegante si sistem de culisare realizat din plastic.Noptiera cu dimensiunile de (W)37.9 x (D)30.1 x (H)48.4 cm, ofera un sertar spatios.Produsul vine demontat cu instructiuni detaliate de asamblare incluse.Acesta poate fi combinat cu alte produse din gama May pentru a realiza un set.')
                ->setPrice(139.99)
                ->setCategory($categories[6])
                ->setImage('http://cdn.ziwind.com/images/cabinet.jpg')
                ->setModelObject('cabinet.obj')
                ->setModelTexture('cabinet.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Scaun de birou ergonomic Kring Lear Fit, PU, negru')
                ->setDescription('Scaun de birou ergonomic Kring Lear Fit, PU, negru Scaunul Kring Lear Fit are un design modern si dotari dintre cele mai bune. Este o alegere care va ofera avantaje, vizual acesta creand un ambient placut, iar corpul dumneavoastra va resimti confort si relaxare, extrem de importante pentru desfasurarea optima a activitatilor de birou. .')
                ->setPrice(279.99)
                ->setCategory($categories[6])
                ->setImage('http://cdn.ziwind.com/images/chair.jpg')
                ->setModelObject('chair.obj')
                ->setModelTexture('chair.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Canapea extensibila Comfort 216/85/82')
                ->setDescription('Comfort reprezinta una dintre cele mai simple, utile si uzuale modele de canapea pentru casa. Extinderea este de tip click – clack. Este un model realizat printr-un design extrem de simplu si fara spatarele laterale, dar care nu afecteaza nici confortul si nici eleganta de care se bucura acest corp de mobilier.')
                ->setPrice(999)
                ->setCategory($categories[6])
                ->setImage('http://cdn.ziwind.com/images/couch3.jpg')
                ->setModelObject('couch3.obj')
                ->setModelTexture('couch3.png')
        );

        $manager->persist(
            (new Product())
                ->setName('Uscator rufe Miele TDB 130 WP Eco (7 kg, cu pompa de aer cald, A++)')
                ->setDescription('TDB130WP Eco Rufe Clasa eficientei energetice-A++ Uscator cu pompa de caldura-invaluite de parfum.')
                ->setPrice(4100)
                ->setCategory($categories[0])
                ->setImage('http://cdn.ziwind.com/images/dryerMachine.jpg')
                ->setModelObject('dryerMachine.obj')
                ->setModelTexture('dryerMachine.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Masa bucatarie ENGEL , Wenge/Argintiu , picioare metal satinat , 1200 x 800 x 730mm')
                ->setDescription('Masa realizata din PAL melaminat de 36 mm, decor wenge/argintiu, cu picioare satinate.')
                ->setPrice(291)
                ->setCategory($categories[6])
                ->setImage('http://cdn.ziwind.com/images/woodenDesk.jpg')
                ->setModelObject('woodenDesk.obj')
                ->setModelTexture('woodenDesk.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Dulap Soft 2 usi cu bara pentru umesare, cires, 80 x 200 x 53 cm')
                ->setDescription('Dulap Soft cu 2 usi fabricat din PAL Melaminat cu grosimea de 16 mm cires, manere din plastic cu filet metalic, 2 spatii de depozitare cu polite si 1 spatiu cu bara de haine pentru umerase, picioruse din plastic cu rol impotriva zgarierii pardoselilor. ')
                ->setPrice(677)
                ->setCategory($categories[6])
                ->setImage('http://cdn.ziwind.com/images/wardrobe.jpg')
                ->setModelObject('wardrobe.obj')
                ->setModelTexture('wardrobe.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Videoproiector BenQ 3D MW705, WXGA, 4000 lumeni, Full HD')
                ->setDescription('Design intuitiv ,Wireless streaming , inalta performanta si silentios. Proiectoarele conventionale de inalta luminozitate fac o multime de zgomot. Nu MW705, care reproduce luminozitate ultra-inalta cu doar 31dB de sunet, chiar si cu puteri depline.')
                ->setPrice(2577)
                ->setCategory($categories[5])
                ->setImage('http://cdn.ziwind.com/images/videoProjector.jpg')
                ->setModelObject('videoProjector.obj')
                ->setModelTexture('videoProjector.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Tinta Dart electronica')
                ->setDescription('AG144 Tinta Dart electronica + 6 sagetiTinta electronica darts (sageti) este foarte distractiv pentru toata lumea, indiferent de varsta.')
                ->setPrice(2577)
                ->setCategory($categories[7])
                ->setImage('http://cdn.ziwind.com/images/dartGame.jpg')
                ->setModelObject('dartGame.obj')
                ->setModelTexture('dartGame.jpg')
        );

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
