<?php

namespace Database\Seeders;

use App\Models\Phase;
use Illuminate\Database\Seeder;

class PhaseSeeder extends Seeder
{
    public function run()
    {
        $phases = [
            [
                'name' => 'Phase 1: Débutant - Algorithmique',
                'description' => 'Concepts fondamentaux de l\'algorithmique et logique de programmation',
                'level' => 'débutant',
                'points_per_question' => 5,
                'order' => 1
            ],
            [
                'name' => 'Phase 2: Intermédiaire - Programmation procédurale',
                'description' => 'Programmation structurée, fonctions et modularité',
                'level' => 'intermédiaire',
                'points_per_question' => 10,
                'order' => 2
            ],
            [
                'name' => 'Phase 3: Avancé - Programmation Orientée Objet',
                'description' => 'Concepts avancés de POO, design patterns et architectures',
                'level' => 'avancé',
                'points_per_question' => 15,
                'order' => 3
            ]
        ];

        foreach ($phases as $phase) {
            Phase::create($phase);
        }

        $this->command->info('✅ Phases créées avec succès!');
    }
}