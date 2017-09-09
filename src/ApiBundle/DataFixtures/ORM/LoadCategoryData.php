<?php

namespace ApiBundle\DataFixtures\ORM;

use ApiBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $manager->persist((new Category())->setName('Masini spalat rufe'));
        $manager->persist((new Category())->setName('Aragazuri'));
        $manager->persist((new Category())->setName('Cuptoare'));
        $manager->persist((new Category())->setName('Frigidere'));
        $manager->persist((new Category())->setName('Scaune'));
        $manager->persist((new Category())->setName('Televizoare'));

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 0;
    }
}
