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
        );

        $manager->persist(
            (new Product())
                ->setName('Cuptor electric Miele H 6461 BP cu comenzi tactile intuitive si functie Umiditate plus pt. rezultate perfecte')
                ->setDescription('Cuptor de perete incorporat')
                ->setPrice(10085.00)
                ->setCategory($categories[2])
                ->setImage('http://cdn.ziwind.com/images/cuptor_electric.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Frigider cu 2 usi Arctic AD54240P+, 223 l, Clasa A+, H 146.5, Alb')
                ->setDescription('Compartiment spatios dedicat depozitarii legumelor si fructelor. Alimentele tale vor fi proaspete si gustoase o perioada indelungata!')
                ->setPrice(749.99)
                ->setCategory($categories[3])
                ->setImage('http://cdn.ziwind.com/images/frigider.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Cuptor cu microunde Beko MWC2000MW, 20 l, 700 W, Mecanic, Alb')
                ->setDescription('Functia Grill reprezinta solutia ideala pentru pregatirea carnii sau rumenirea la suprafata a alimentelor.')
                ->setPrice(339.42)
                ->setCategory($categories[2])
                ->setImage('http://cdn.ziwind.com/images/microunde.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Aragaz Zanussi ZCG210M1WA, Gaz, 4 Arzatoare, Siguranta plita/cuptor, 50 cm, Alb')
                ->setDescription('Daca aveti probleme cu spatiul din bucatarie, acest aragaz va ajuta sa nu faceti compromisuri in ceea ce priveste optiunile la gatit. Formatul sau ingust asigura potrivirea usoara in orice loc din bucataria dumneavoastra, insa ofera acelasi spatiu la interior si functii de gatit ca un aragaz standard.')
                ->setPrice(699.99)
                ->setCategory($categories[2])
                ->setImage('http://cdn.ziwind.com/images/aragaz.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Scaun living Kring Kai, PP si lemn, Rosu')
                ->setDescription('Scaun living Kring Kai, PP si lemn, Rosu. In amenajarea spatiului de dining iti poti lasa imaginatia libera si poti crea un décor indraznet si personal.')
                ->setPrice(139.99)
                ->setCategory($categories[4])
                ->setImage('http://cdn.ziwind.com/images/scaun.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Televizor LED Samsung, 80 cm, 32J4000, HD')
                ->setDescription('Utilizand un algoritm avansat de imbunatatire a calitatii imaginilor, functia Wide Colour Enhancer de la Samsung imbunatateste calitatea imaginilor si reda pana si cele mai mici detalii. Acum puteti vedea culori mult mai vii, cu Wide Colour Enhancer.')
                ->setPrice(799.99)
                ->setCategory($categories[5])
                ->setImage('http://cdn.ziwind.com/images/tv1.jpg')
        );

        $manager->persist(
            (new Product())
                ->setName('Televizor LED Game TV LG, 80 cm, 32LH510B, HD')
                ->setDescription('Cea mai noua si avansata tehnologie LG, Triple XD Engine, ofera cel mai inalt grad de excelenta in privinta culorii, contrastului si claritatii, pentru cea mai buna calitate a imaginii si performanta.')
                ->setPrice(949.99)
                ->setCategory($categories[5])
                ->setImage('http://cdn.ziwind.com/images/tv2.jpg')
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
