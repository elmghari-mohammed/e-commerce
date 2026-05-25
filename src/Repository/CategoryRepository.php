<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * @return array<int, array{0: Category, productCount: int}>
     */
    public function findAllWithProductCount(): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.products', 'p')
            ->groupBy('c.id')
            ->select('c', 'COUNT(p.id) as productCount')
            ->getQuery()
            ->getResult();
    }
}
