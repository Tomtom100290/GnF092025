<?php

namespace App\Repository;

use App\Entity\TypeProduit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produit>
 */
class TypeProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeProduit::class);
    }

    //    /**
    //     * @return Produit[] Returns an array of Produit objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Produit
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function findProduitsGourmandises(): array
    {
        return $this->createQueryBuilder('p')
            ->join('p.fkCategorieProduit', 'c')
            ->where('c.nom = :nom')
            ->setParameter('nom', 'Gourmandise')
            ->getQuery()
            ->getResult();
    }
    public function findProduitsCadeaux(): array
    {
        return $this->createQueryBuilder('p')
            ->join('p.fkCategorieProduit', 'c')
            ->where('c.nom = :nom')
            ->setParameter('nom', 'Cadeaux')
            ->getQuery()
            ->getResult();
    }
    public function findProduitsPapetterie(): array
    {
        return $this->createQueryBuilder('p')
            ->join('p.fkCategorieProduit', 'c')
            ->where('c.nom = :nom')
            ->setParameter('nom', 'Papetterie')
            ->getQuery()
            ->getResult();
    }
        public function findAllActifs()
{
    return $this->createQueryBuilder('c')
        ->andWhere('c.topActif = :active')
        ->setParameter('active', true)
        ->getQuery()
        ->getResult();
}
}
