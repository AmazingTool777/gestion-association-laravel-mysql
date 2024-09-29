<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDonationRequest;

class DonationController extends Controller
{
    public function store(StoreDonationRequest $request)
    {
        $dto = $request->validated();

        $authUser = $request->user();

        DB::beginTransaction();

        $donation = Donation::create([
            "amount" => $dto["amount"],
            "giver_info" => json_encode([
                "full_name" => $dto['donation_giver_fullname'],
                "email" => $dto['donation_giver_email'],
                "phone" => $dto['donation_giver_phone'],
            ]),
            "user_id" => $authUser->id,
            "donation_call_id" => $dto["donation_call_id"],
        ]);

        $donation->load("donationCall");
        $donation->donationCall->addCollectedAmount($dto["amount"]);

        DB::commit();

        return redirect()->back()->with("success", "Votre don a bien été envoyé");
    }

    public function apiIndex(Request $request)
    {
        $query = Donation::with("user")->orderBy("created_at", "desc");

        if ($request->query("donation_call_id")) {
            $query->where("donation_call_id", $request->query("donation_call_id"));
        }

        $pageSize = $request->query("page_size", 5);
        return $query->paginate($pageSize);
    }
}
