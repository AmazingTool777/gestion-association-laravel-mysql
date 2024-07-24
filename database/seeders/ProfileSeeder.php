<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                "first_name" => "Hasina",
                "last_name" => "MBOLATIANA",
                "birthday" => Carbon::create(1998, 5, 14),
                "gender" => "F",
                "address" => "Lot III B 85 EE Anjanahary, Antananarivo, Madagascar",
                "zip_code" => "101",
                "origin" => "NATIONAL",
                "id_card" => json_encode([
                    "id" => "101123459774",
                    "delivered_at" => "2020-11-02",
                    "delivered_in" => "Antananarivo II",
                ]),
                "profession" => "Etudiante",
                "phone" => "0332254503",
                "user_id" => 1,
            ],
            [
                "first_name" => "Sitraka",
                "last_name" => "RAMANOELINA",
                "birthday" => Carbon::create(2000, 11, 14),
                "gender" => "M",
                "address" => "Lot X 12 IB Androndra, Antananarivo, Madagascar",
                "zip_code" => "101",
                "origin" => "NATIONAL",
                "id_card" => json_encode([
                    "id" => "101023896145",
                    "delivered_at" => "2020-11-02",
                    "delivered_in" => "Antananarivo IV",
                ]),
                "profession" => "Etudiant",
                "phone" => "0341200368",
                "user_id" => 2,
            ],
            [
                "first_name" => "Fenitra",
                "last_name" => "ANDRIANIAINA",
                "birthday" => Carbon::create(2002, 8, 22),
                "gender" => "F",
                "address" => "Lot IV 56 IT Antsobolo, Antananarivo, Madagascar",
                "zip_code" => "101",
                "origin" => "NATIONAL",
                "id_card" => json_encode([
                    "id" => "101213255789",
                    "delivered_at" => "2020-11-02",
                    "delivered_in" => "Antananarivo III",
                ]),
                "profession" => "Etudiante",
                "phone" => "0324578921",
                "user_id" => 3,
            ],
            [
                "first_name" => "Tolotra",
                "last_name" => "RABEFALY",
                "birthday" => Carbon::create(2000, 9, 11),
                "gender" => "M",
                "address" => "Lot II E 45 IS Ankadindramamy, Antananarivo, Madagascar",
                "zip_code" => "101",
                "origin" => "NATIONAL",
                "id_card" => json_encode([
                    "id" => "101251213417",
                    "delivered_at" => "2018-12-12",
                    "delivered_in" => "Antananarivo V",
                ]),
                "profession" => "Etudiant",
                "phone" => "0324924506",
                "user_id" => 4,
            ]
        ]);
    }
}
