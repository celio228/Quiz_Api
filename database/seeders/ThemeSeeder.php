<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    public function run()
    {
        $themes = [
            // Phase 1 - Algorithmique
            [
                'phase_id' => 1,
                'name' => 'Les systèmes de numération',
                'description' => 'Binaire, hexadécimal, conversions entre bases',
                'order' => 1
            ],
            [
                'phase_id' => 1,
                'name' => 'Les boucles',
                'description' => 'Boucles for, while, do-while et leurs utilisations',
                'order' => 2
            ],
            [
                'phase_id' => 1,
                'name' => 'Les conditions',
                'description' => 'Structures conditionnelles if/else, switch case',
                'order' => 3
            ],
            [
                'phase_id' => 1,
                'name' => 'Les variables et types de données',
                'description' => 'Déclaration, typage et portée des variables',
                'order' => 4
            ],

            // Phase 2 - Programmation procédurale
            [
                'phase_id' => 2,
                'name' => 'Fonctions et procédures',
                'description' => 'Définition, paramètres et valeur de retour',
                'order' => 1
            ],
            [
                'phase_id' => 2,
                'name' => 'Tableaux et collections',
                'description' => 'Manipulation des structures de données linéaires',
                'order' => 2
            ],
            [
                'phase_id' => 2,
                'name' => 'Portée des variables',
                'description' => 'Variables locales, globales et static',
                'order' => 3
            ],
            [
                'phase_id' => 2,
                'name' => 'Récursivité',
                'description' => 'Fonctions récursives et cas de base',
                'order' => 4
            ],

            // Phase 3 - POO
            [
                'phase_id' => 3,
                'name' => 'Classes et objets',
                'description' => 'Concepts fondamentaux de la POO',
                'order' => 1
            ],
            [
                'phase_id' => 3,
                'name' => 'Héritage et polymorphisme',
                'description' => 'Relations entre classes et redéfinition',
                'order' => 2
            ],
            [
                'phase_id' => 3,
                'name' => 'Encapsulation',
                'description' => 'Visibilité et contrôle d\'accès',
                'order' => 3
            ],
            [
                'phase_id' => 3,
                'name' => 'Interfaces et classes abstraites',
                'description' => 'Abstraction et contrat de méthode',
                'order' => 4
            ]
        ];

        foreach ($themes as $theme) {
            Theme::create($theme);
        }

        $this->command->info('✅ Thèmes créés avec succès!');
    }
}