<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DonationCallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('donation_calls')->insert([
            [
                "title" => "Aide d'urgence pour les victimes de l'inondation",
                "type_id" => 1,
                "description" => "<p>Les inondations récentes ont causé des dégâts considérables dans la région. Nous avons besoin de votre soutien pour aider les personnes touchées à se relever.</p>",
                "collected_amount" => 567890,
                "required_amount" => 2000000,
                "mobile_payment_phones" => json_encode(["0321234567", "0339876543"]),
                "photo" => "01.jpg"
            ],
            [
                "title" => "Reconstruction de l'école primaire de Tsiroanomandidy",
                "type_id" => 2,
                "description" => "<p>L'école primaire de Tsiroanomandidy a été endommagée par un cyclone. Nous avons besoin de votre aide pour la reconstruire.</p>",
                "collected_amount" => 1234567,
                "required_amount" => 5000000,
                "mobile_payment_phones" => json_encode(["0348765432"]),
                "photo" => "02.jpg"
            ],
            [
                "title" => "Soulagement de la famine dans le sud de Madagascar",
                "type_id" => 3,
                "description" => "<p>La famine sévit dans le sud de Madagascar. Nous avons besoin de votre soutien pour fournir des denrées alimentaires aux populations touchées.</p>",
                "collected_amount" => 3456789,
                "required_amount" => 10000000,
                "mobile_payment_phones" => json_encode(["0329876543", "0331234567"]),
                "photo" => "03.jpg"
            ],
            [
                "title" => "Aide médicale d'urgence pour les enfants malnutris",
                "type_id" => 1,
                "description" => "<p>Les enfants malnutris ont besoin de soins médicaux urgents. Nous avons besoin de votre soutien pour financer leur traitement.</p>",
                "collected_amount" => 789123,
                "required_amount" => 3000000,
                "mobile_payment_phones" => json_encode(["0341234567"]),
                "photo" => "04.png"
            ],
            [
                "title" => "Construction d'un centre de santé dans la région de Fianarantsoa",
                "type_id" => 2,
                "description" => "<p>La région de Fianarantsoa manque de centres de santé. Nous avons besoin de votre soutien pour construire un nouveau centre.</p>",
                "collected_amount" => 912345,
                "required_amount" => 8000000,
                "mobile_payment_phones" => json_encode(["0328765432", "0331234567"]),
                "photo" => "05.jpg"
            ],
            [
                "title" => "Aide alimentaire pour les victimes du séisme",
                "type_id" => 1,
                "description" => "<p>Le séisme récent a causé des dégâts considérables dans la région. Nous avons besoin de votre soutien pour fournir des denrées alimentaires aux personnes touchées.</p>",
                "collected_amount" => 100000,
                "required_amount" => 4000000,
                "mobile_payment_phones" => json_encode(["0349876543"]),
                "photo" => "06.jpg"
            ],
            [
                "title" => "Reconstruction des écoles endommagées par le cyclone",
                "type_id" => 2,
                "description" => "<p>Les cyclones ont endommagé de nombreuses écoles dans le pays. Nous avons besoin de votre soutien pour les reconstruire.</p>",
                "collected_amount" => 2000000,
                "required_amount" => 6000000,
                "mobile_payment_phones" => json_encode(["0321234567", "0338765432"]),
                "photo" => "07.jpg"
            ],
            [
                "title" => "Soulagement de la sécheresse dans le nord de Madagascar",
                "type_id" => 3,
                "description" => "<p>La sécheresse sévit dans le nord de Madagascar. Nous avons besoin de votre soutien pour fournir de l'eau potable et des denrées alimentaires aux populations touchées.</p>",
                "collected_amount" => 3000000,
                "required_amount" => 7000000,
                "mobile_payment_phones" => json_encode(["0341234567", "0339876543"]),
                "photo" => "08.jpg"
            ],
            [
                "title" => "Aide médicale d'urgence pour les victimes de l'épidémie",
                "type_id" => 1,
                "description" => "<p>L'épidémie récente a causé des dégâts considérables dans la région. Nous avons besoin de votre soutien pour fournir des soins médicaux aux personnes touchées.</p>",
                "collected_amount" => 4000000,
                "required_amount" => 5000000,
                "mobile_payment_phones" => json_encode(["0329876543"]),
                "photo" => "09.jpg"
            ],
            [
                "title" => "Construction de logements pour les personnes déplacées",
                "type_id" => 2,
                "description" => "<p>Les catastrophes naturelles ont causé le déplacement de nombreuses personnes. Nous avons besoin de votre soutien pour construire des logements pour ces personnes.</p>",
                "collected_amount" => 5000000,
                "required_amount" => 10000000,
                "mobile_payment_phones" => json_encode(["0331234567", "0348765432"]),
                "photo" => "10.jpg"
            ],
            [
                "title" => "Soutien aux services de santé mentale dans les zones rurales",
                "type_id" => 4,
                "description" => "<p>Les services de santé mentale sont limités dans les zones rurales. Nous avons besoin de votre soutien pour fournir des conseils et un accompagnement aux personnes dans le besoin.</p>",
                "collected_amount" => 6000000,
                "required_amount" => 8000000,
                "mobile_payment_phones" => json_encode(["0321234567", "0339876543"]),
                "photo" => "11.jpg"
            ],
            [
                "title" => "Bourses d'études pour les élèves défavorisés",
                "type_id" => 5,
                "description" => "<p>De nombreux élèves ne peuvent pas se permettre des études. Nous avons besoin de votre soutien pour offrir des bourses d'études aux élèves défavorisés.</p>",
                "collected_amount" => 7000000,
                "required_amount" => 10000000,
                "mobile_payment_phones" => json_encode(["0348765432"]),
                "photo" => "12.jpg"
            ],
            [
                "title" => "Efforts de reforestation pour lutter contre la déforestation",
                "type_id" => 6,
                "description" => "<p>La déforestation est un problème majeur. Nous avons besoin de votre soutien pour reboiser les zones et protéger notre environnement.</p>",
                "collected_amount" => 8000000,
                "required_amount" => 12000000,
                "mobile_payment_phones" => json_encode(["0329876543", "0331234567"]),
                "photo" => "13.jpg"
            ],
            [
                "title" => "Intervention d'urgence pour les catastrophes naturelles",
                "type_id" => 7,
                "description" => "<p>Les catastrophes naturelles peuvent causer des dommages importants. Nous avons besoin de votre soutien pour fournir une intervention d'urgence et des efforts de secours.</p>",
                "collected_amount" => 9000000,
                "required_amount" => 15000000,
                "mobile_payment_phones" => json_encode(["0341234567"]),
                "photo" => "14.jpg"
            ],
            [
                "title" => "Amélioration de l'accès aux soins de santé dans les zones reculées",
                "type_id" => 8,
                "description" => "<p>Les soins de santé sont limités dans les zones reculées. Nous avons besoin de votre soutien pour améliorer l'accès aux soins de santé pour ces communautés.</p>",
                "collected_amount" => 10000000,
                "required_amount" => 20000000,
                "mobile_payment_phones" => json_encode(["0331234567", "0348765432"]),
                "photo" => "15.jpg"
            ],
            [
                "title" => "Soulagement de la sécheresse dans le sud de Madagascar",
                "type_id" => 3,
                "description" => "<p>La sécheresse sévit dans le sud de Madagascar. Nous avons besoin de votre soutien pour fournir de l'eau potable et des denrées alimentaires aux populations touchées.</p>",
                "collected_amount" => 1000000,
                "required_amount" => 3000000,
                "mobile_payment_phones" => json_encode(["0341234567"]),
                "photo" => "16.png"
            ],
            [
                "title" => "Aide d'urgence pour les victimes de l'ouragan",
                "type_id" => 1,
                "description" => "<p>L'ouragan récent a causé des dégâts considérables dans la région. Nous avons besoin de votre soutien pour aider les personnes touchées à se relever.</p>",
                "collected_amount" => 2000000,
                "required_amount" => 5000000,
                "mobile_payment_phones" => json_encode(["0329876543", "0331234567"]),
                "photo" => "17.jpg"
            ],
            [
                "title" => "Construction de logements pour les personnes déplacées par le volcan",
                "type_id" => 2,
                "description" => "<p>Le volcan récent a causé le déplacement de nombreuses personnes. Nous avons besoin de votre soutien pour construire des logements pour ces personnes.</p>",
                "collected_amount" => 3000000,
                "required_amount" => 7000000,
                "mobile_payment_phones" => json_encode(["0341234567", "0339876543"]),
                "photo" => "18.png"
            ],
            [
                "title" => "Aide médicale d'urgence pour les victimes de l'épidémie de choléra",
                "type_id" => 1,
                "description" => "<p>L'épidémie de choléra récente a causé des dégâts considérables dans la région. Nous avons besoin de votre soutien pour fournir des soins médicaux aux personnes touchées.</p>",
                "collected_amount" => 4000000,
                "required_amount" => 5000000,
                "mobile_payment_phones" => json_encode(["0329876543"]),
                "photo" => "19.jpg"
            ],
            [
                "title" => "Soulagement de la sécheresse dans le nord de Madagascar",
                "type_id" => 3,
                "description" => "<p>La sécheresse sévit dans le nord de Madagascar. Nous avons besoin de votre soutien pour fournir de l'eau potable et des denrées alimentaires aux populations touchées.</p>",
                "collected_amount" => 5000000,
                "required_amount" => 10000000,
                "mobile_payment_phones" => json_encode(["0331234567", "0348765432"]),
                "photo" => "20.png"
            ],
            [
                "title" => "Aide alimentaire pour les victimes des inondations dans le sud",
                "type_id" => 1,
                "description" => "<p>Les inondations récentes dans le sud ont causé des dégâts considérables. Nous avons besoin de votre soutien pour fournir des denrées alimentaires aux personnes touchées.</p>",
                "collected_amount" => 6000000,
                "required_amount" => 8000000,
                "mobile_payment_phones" => json_encode(["0321234567", "0339876543"]),
                "photo" => "21.png"
            ],
            [
                "title" => "Reconstruction des écoles endommagées par le tremblement de terre",
                "type_id" => 2,
                "description" => "<p>Le tremblement de terre récent a endommagé de nombreuses écoles dans la région. Nous avons besoin de votre soutien pour les reconstruire.</p>",
                "collected_amount" => 7000000,
                "required_amount" => 10000000,
                "mobile_payment_phones" => json_encode(["0348765432"]),
                "photo" => "22.jpg"
            ],
            [
                "title" => "Soulagement de la famine dans le nord de Madagascar",
                "type_id" => 3,
                "description" => "<p>La famine sévit dans le nord de Madagascar. Nous avons besoin de votre soutien pour fournir des denrées alimentaires aux populations touchées.</p>",
                "collected_amount" => 8000000,
                "required_amount" => 12000000,
                "mobile_payment_phones" => json_encode(["0329876543", "0331234567"]),
                "photo" => "23.jpg"
            ],
            [
                "title" => "Soulagement de la sécheresse dans le sud-ouest de Madagascar",
                "type_id" => 3,
                "description" => "<p>La sécheresse sévit dans le sud-ouest de Madagascar. Nous avons besoin de votre soutien pour fournir de l'eau potable et des denrées alimentaires aux populations touchées.</p>",
                "collected_amount" => 10000000,
                "required_amount" => 20000000,
                "mobile_payment_phones" => json_encode(["0328765432", "0331234567"]),
                "photo" => "24.png"
            ],
            [
                "title" => "Aide alimentaire pour les victimes des inondations dans le centre",
                "type_id" => 1,
                "description" => "<p>Les inondations récentes dans le centre ont causé des dégâts considérables. Nous avons besoin de votre soutien pour fournir des denrées alimentaires aux personnes touchées.</p>",
                "collected_amount" => 11000000,
                "required_amount" => 25000000,
                "mobile_payment_phones" => json_encode(["0321234567", "0339876543"]),
                "photo" => "25.jpg"
            ],
            [
                "title" => "Reconstruction des écoles endommagées par le cyclone tropical",
                "type_id" => 2,
                "description" => "<p>Le cyclone tropical récent a endommagé de nombreuses écoles dans la région. Nous avons besoin de votre soutien pour les reconstruire.</p>",
                "collected_amount" => 12000000,
                "required_amount" => 30000000,
                "mobile_payment_phones" => json_encode(["0348765432"]),
                "photo" => "26.png"
            ],
            [
                "title" => "Soulagement de la sécheresse dans le sud-est de Madagascar",
                "type_id" => 3,
                "description" => "<p>La sécheresse sévit dans le sud-est de Madagascar. Nous avons besoin de votre soutien pour fournir de l'eau potable et des denrées alimentaires aux populations touchées.</p>",
                "collected_amount" => 13000000,
                "required_amount" => 35000000,
                "mobile_payment_phones" => json_encode(["0329876543", "0331234567"]),
                "photo" => "27.png"
            ],
            [
                "title" => "Aide médicale d'urgence pour les victimes de l'épidémie de dengue",
                "type_id" => 1,
                "description" => "<p>L'épidémie de dengue récente a causé des dégâts considérables dans la région. Nous avons besoin de votre soutien pour fournir des soins médicaux aux personnes touchées.</p>",
                "collected_amount" => 14000000,
                "required_amount" => 40000000,
                "mobile_payment_phones" => json_encode(["0341234567"]),
                "photo" => "28.jpg"
            ]
        ]);
    }
}
