# Projet E-commerce Symfony

Projet réalisé dans le cadre du TP E-commerce avec Symfony.

## Fonctionnalités

- Gestion des produits (CRUD)
- Gestion des catégories
- Interface d'administration sécurisée
- Profil utilisateur
- Gestion du panier (TODO)

## Installation

1. Cloner le projet

git clone https://github.com/imami07/symfony-ecommerce.git


2. Installer les dépendances

composer install

3. Configurer la base de données dans .env
Créer la base de données

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

4. Charger les fixtures

php bin/console doctrine:fixtures:load


#Auteur

Hajar IMAMI
Chaimae HALLAB
Aya BENAYYAD
