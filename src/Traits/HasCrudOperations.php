<?php
	
	namespace App\Traits;
	
	trait HasCrudOperations
	{
		public function save(object $entity, bool $flush = false): void
		{
			$this->getEntityManager()->persist($entity);
			
			if ($flush) {
				$this->getEntityManager()->flush();
			}
		}
		
		public function remove(object $entity, bool $flush = false): void
		{
			$this->getEntityManager()->remove($entity);
			
			if ($flush) {
				$this->getEntityManager()->flush();
			}
		}
	}
