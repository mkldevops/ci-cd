<?php

namespace App\Tests;

use App\Entity\Book;
use App\Entity\Category;
use App\Service\BookFormatter;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BookFormatterTest extends KernelTestCase
{
    public function testFormatBookInfo()
    {
        // Initialise le noyau et le conteneur pour accéder aux services
        self::bootKernel();
        $container = self::$kernel->getContainer();
        // Récupère le service BookFormatter
        $bookFormatter = $container->get(BookFormatter::class);
        // Crée un nouveau livre
        $category = (new Category())->setName('Fiction');
        $book = (new Book($category))
          ->setTitle('Test Book')
          ->setAuthor('John Doe');
        // Formate les informations du livre
        $formattedInfo = $bookFormatter->format($book);
        // Vérifie si les informations du livre sont correctement formatées
        static::assertEquals('Test Book by John Doe (Fiction)', $formattedInfo);
    }
}
