<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            // Phase 1 - Thème 1: Systèmes de numération
            [
                'theme_id' => 1,
                'question_text' => 'Quelle est la valeur décimale du nombre binaire 1010?',
                'question_type' => 'multiple_choice',
                'points' => 5,
                'options' => [
                    ['option_text' => '8', 'is_correct' => false],
                    ['option_text' => '10', 'is_correct' => true],
                    ['option_text' => '12', 'is_correct' => false],
                    ['option_text' => '15', 'is_correct' => false]
                ]
            ],
            [
                'theme_id' => 1,
                'question_text' => 'Quel système de numération utilise la base 16?',
                'question_type' => 'multiple_choice',
                'points' => 5,
                'options' => [
                    ['option_text' => 'Binaire', 'is_correct' => false],
                    ['option_text' => 'Décimal', 'is_correct' => false],
                    ['option_text' => 'Hexadécimal', 'is_correct' => true],
                    ['option_text' => 'Octal', 'is_correct' => false]
                ]
            ],
            [
                'theme_id' => 1,
                'question_text' => 'Convertir le nombre hexadécimal A3 en décimal',
                'question_type' => 'multiple_choice',
                'points' => 5,
                'options' => [
                    ['option_text' => '153', 'is_correct' => false],
                    ['option_text' => '163', 'is_correct' => true],
                    ['option_text' => '173', 'is_correct' => false],
                    ['option_text' => '183', 'is_correct' => false]
                ]
            ],

            // Phase 1 - Thème 2: Les boucles
            [
                'theme_id' => 2,
                'question_text' => 'Quelle boucle est garantie de s\'exécuter au moins une fois?',
                'question_type' => 'multiple_choice',
                'points' => 5,
                'options' => [
                    ['option_text' => 'for', 'is_correct' => false],
                    ['option_text' => 'while', 'is_correct' => false],
                    ['option_text' => 'do-while', 'is_correct' => true],
                    ['option_text' => 'foreach', 'is_correct' => false]
                ]
            ],
            [
                'theme_id' => 2,
                'question_text' => 'Quelle est la complexité d\'une boucle for qui itère n fois?',
                'question_type' => 'multiple_choice',
                'points' => 5,
                'options' => [
                    ['option_text' => 'O(1)', 'is_correct' => false],
                    ['option_text' => 'O(log n)', 'is_correct' => false],
                    ['option_text' => 'O(n)', 'is_correct' => true],
                    ['option_text' => 'O(n²)', 'is_correct' => false]
                ]
            ],

            // Phase 1 - Thème 3: Les conditions
            [
                'theme_id' => 3,
                'question_text' => 'Quelle structure permet de gérer plusieurs cas distincts?',
                'question_type' => 'multiple_choice',
                'points' => 5,
                'options' => [
                    ['option_text' => 'if-else', 'is_correct' => false],
                    ['option_text' => 'switch', 'is_correct' => true],
                    ['option_text' => 'while', 'is_correct' => false],
                    ['option_text' => 'for', 'is_correct' => false]
                ]
            ],
            [
                'theme_id' => 3,
                'question_text' => 'Quel opérateur représente le ET logique?',
                'question_type' => 'multiple_choice',
                'points' => 5,
                'options' => [
                    ['option_text' => '&&', 'is_correct' => true],
                    ['option_text' => '||', 'is_correct' => false],
                    ['option_text' => '!', 'is_correct' => false],
                    ['option_text' => '==', 'is_correct' => false]
                ]
            ],

            // Phase 2 - Thème 1: Fonctions
            [
                'theme_id' => 5,
                'question_text' => 'Qu\'est-ce qu\'une fonction pure?',
                'question_type' => 'multiple_choice',
                'points' => 10,
                'options' => [
                    ['option_text' => 'Une fonction sans paramètres', 'is_correct' => false],
                    ['option_text' => 'Une fonction qui modifie des variables globales', 'is_correct' => false],
                    ['option_text' => 'Une fonction sans effets de bord', 'is_correct' => true],
                    ['option_text' => 'Une fonction récursive', 'is_correct' => false]
                ]
            ],
            [
                'theme_id' => 5,
                'question_text' => 'Quel est l\'avantage de la modularité?',
                'question_type' => 'multiple_choice',
                'points' => 10,
                'options' => [
                    ['option_text' => 'Réduction de la complexité', 'is_correct' => false],
                    ['option_text' => 'Réutilisabilité du code', 'is_correct' => false],
                    ['option_text' => 'Facilitation de la maintenance', 'is_correct' => false],
                    ['option_text' => 'Toutes ces réponses', 'is_correct' => true]
                ]
            ],

            // Phase 2 - Thème 2: Tableaux
            [
                'theme_id' => 6,
                'question_text' => 'Quelle est la complexité de l\'accès à un élément par index dans un tableau?',
                'question_type' => 'multiple_choice',
                'points' => 10,
                'options' => [
                    ['option_text' => 'O(1)', 'is_correct' => true],
                    ['option_text' => 'O(n)', 'is_correct' => false],
                    ['option_text' => 'O(log n)', 'is_correct' => false],
                    ['option_text' => 'O(n²)', 'is_correct' => false]
                ]
            ],

            // Phase 3 - Thème 1: Classes et objets
            [
                'theme_id' => 9,
                'question_text' => 'Qu\'est-ce qu\'un objet en POO?',
                'question_type' => 'multiple_choice',
                'points' => 15,
                'options' => [
                    ['option_text' => 'Une instance de classe', 'is_correct' => true],
                    ['option_text' => 'Une fonction', 'is_correct' => false],
                    ['option_text' => 'Une variable globale', 'is_correct' => false],
                    ['option_text' => 'Un type de données', 'is_correct' => false]
                ]
            ],
            [
                'theme_id' => 9,
                'question_text' => 'Quels sont les trois principes fondamentaux de la POO?',
                'question_type' => 'multiple_choice',
                'points' => 15,
                'options' => [
                    ['option_text' => 'Encapsulation, héritage, polymorphisme', 'is_correct' => true],
                    ['option_text' => 'Variables, fonctions, classes', 'is_correct' => false],
                    ['option_text' => 'Public, private, protected', 'is_correct' => false],
                    ['option_text' => 'Méthodes, attributs, constructeurs', 'is_correct' => false]
                ]
            ],

            // Phase 3 - Thème 2: Héritage
            [
                'theme_id' => 10,
                'question_text' => 'Qu\'est-ce que le polymorphisme?',
                'question_type' => 'multiple_choice',
                'points' => 15,
                'options' => [
                    ['option_text' => 'Capacité d\'une méthode à avoir plusieurs formes', 'is_correct' => true],
                    ['option_text' => 'Héritage multiple', 'is_correct' => false],
                    ['option_text' => 'Encapsulation des données', 'is_correct' => false],
                    ['option_text' => 'Abstraction des classes', 'is_correct' => false]
                ]
            ],
            [
                'theme_id' => 10,
                'question_text' => 'Quel mot-clé permet de redéfinir une méthode dans une classe dérivée?',
                'question_type' => 'multiple_choice',
                'points' => 15,
                'options' => [
                    ['option_text' => 'override', 'is_correct' => true],
                    ['option_text' => 'extends', 'is_correct' => false],
                    ['option_text' => 'implements', 'is_correct' => false],
                    ['option_text' => 'super', 'is_correct' => false]
                ]
            ],

            // Phase 3 - Thème 3: Encapsulation
            [
                'theme_id' => 11,
                'question_text' => 'Quel modificateur d\'accès est le plus restrictif?',
                'question_type' => 'multiple_choice',
                'points' => 15,
                'options' => [
                    ['option_text' => 'private', 'is_correct' => true],
                    ['option_text' => 'protected', 'is_correct' => false],
                    ['option_text' => 'public', 'is_correct' => false],
                    ['option_text' => 'package', 'is_correct' => false]
                ]
            ]
        ];

        foreach ($questions as $questionData) {
            $question = Question::create([
                'theme_id' => $questionData['theme_id'],
                'question_text' => $questionData['question_text'],
                'question_type' => $questionData['question_type'],
                'points' => $questionData['points']
            ]);

            foreach ($questionData['options'] as $optionData) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionData['option_text'],
                    'is_correct' => $optionData['is_correct']
                ]);
            }
        }

        $this->command->info('✅ Questions et options créées avec succès!');
        $this->command->info('📊 Total: ' . count($questions) . ' questions créées');
    }
}