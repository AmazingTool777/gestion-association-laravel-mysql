<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\DonationCall;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DonationSeeder extends Seeder
{
    private function generateMalagasyPhoneNumber($prefix)
    {
        // Generate 7 random digits
        $randomDigits = '';
        for ($i = 0; $i < 7; $i++) {
            $randomDigits .= mt_rand(0, 9);
        }

        // Combine prefix and random digits
        $phoneNumber = $prefix . $randomDigits;

        return $phoneNumber;
    }

    private function decomposeInteger($number, $count = 3)
    {
        if ($count <= 0) {
            return [];
        }

        $result = [];
        $remaining = $number;

        for ($i = 0; $i < $count - 1; $i++) {
            // Generate a random number between 0 and the remaining amount
            $randomPart = mt_rand(0, $remaining);
            $result[] = $randomPart;
            $remaining -= $randomPart;
        }

        // Add the remaining amount as the last part
        $result[] = $remaining;

        return $result;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $donationCalls = DonationCall::all();
        $donationCallsCount = $donationCalls->count();
        $users = User::with("profile")->get();
        $usersCount = $users->count();

        $donations = [];

        $DONATIONS_PER_DONATION_CALL_COUNT = 3;

        for ($i = 0; $i < $donationCallsCount; $i++) {
            $donationCall = $donationCalls[$i];

            $donationsAmounts = $this->decomposeInteger($donationCall->collected_amount, $DONATIONS_PER_DONATION_CALL_COUNT);

            for ($j = 0; $j < $DONATIONS_PER_DONATION_CALL_COUNT; $j++) {
                $userIndex = ($i * $DONATIONS_PER_DONATION_CALL_COUNT + $j) % $usersCount;
                $user = $users[$userIndex];
                $phonePrefix = substr($donationCall->mobile_payment_phones[0], 0, 3);
                $donationAmount = $donationsAmounts[$j];

                $donation = Donation::factory()
                    ->make([
                        'amount' => $donationAmount,
                        'giver_info' => json_encode([
                            "full_name" => $user->profile->first_name . " " . $user->profile->last_name,
                            "email" => $user->email,
                            "phone" => $this->generateMalagasyPhoneNumber($phonePrefix),
                        ]),
                        'user_id' => $user->id,
                        'donation_call_id' => $donationCall->id,
                    ])
                    ->toArray();

                $donations[] = $donation;
            }
        }

        DB::table('donations')->insert($donations);
    }
}
