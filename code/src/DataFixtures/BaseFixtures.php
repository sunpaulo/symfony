<?php
/**
 * Created by PhpStorm.
 * User: PaulKameisha
 * Date: 24.09.2019
 * Time: 16:05
 */

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

abstract class BaseFixtures extends Fixture
{
    /** @var Generator $faker */
    protected $faker;

    /** @var ObjectManager $manager */
    protected $manager;

    abstract protected function loadData(ObjectManager $manager);

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;
        $this->faker = Factory::create();

        $this->loadData($manager);
    }

    public function createMany(string $className, int $count, callable $factory): void
    {
        for ($i = 0; $i < $count; $i++) {
            $entity = new $className();
            $factory($entity, $i);
            $this->manager->persist($entity);
            $this->addReference($className . '_' . $i, $entity);
        }
    }
}