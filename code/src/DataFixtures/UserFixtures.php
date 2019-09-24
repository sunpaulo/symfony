<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends BaseFixtures
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(User::class, 10, function (User $user) {
            $user
                ->setName($this->faker->firstName)
                ->setSurname($this->faker->lastName)
                ->setEmail($this->faker->unique()->safeEmail)
                ->setPassword(
                    $this->encoder->encodePassword($user, 'secret')
                );
        });

        $manager->flush();
    }
}
