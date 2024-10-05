<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donation;
use App\Models\DonationCall;
use Illuminate\Http\Request;
use App\Models\AssociationEvent;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $donationCallsCount = DonationCall::count();
        $donationsCount = Donation::count();
        $eventsCount = AssociationEvent::count();

        $donationsTotalCollectedAmount = Donation::sum("amount");
        $donationsCollectedAmountLastSevenDays = Donation::where("created_at", ">", now()->subDays(7))
            ->addSelect(DB::raw("DATE(created_at) as date"))
            ->addSelect(DB::raw("SUM(amount) as amount"))
            ->groupBy("date")
            ->orderBy("date", "asc")
            ->get();
        $topDonators = Donation::selectRaw("JSON_UNQUOTE(JSON_EXTRACT(giver_info, '$.full_name')) as full_name")
            ->addSelect(DB::raw("SUM(amount) as amount"))
            ->groupBy(DB::raw("full_name"))
            ->orderBy("amount", "desc")
            ->take(5)
            ->get();
        $donationCallsPerType = DonationCall::select(DB::raw("COUNT(*) as count"), DB::raw("donation_call_types.name as type"))
            ->join("donation_call_types", "donation_call_types.id", "=", "donation_calls.type_id")
            ->groupBy(DB::raw("type"))
            ->orderBy("count", "desc")
            ->get();
        $recentDonationCalls = DonationCall::select("title", "required_amount", DB::raw("donation_call_types.name as type"))
            ->join("donation_call_types", "donation_call_types.id", "=", "donation_calls.type_id")
            ->orderBy(DB::raw("donation_calls.created_at"), "desc")
            ->take(5)
            ->get();

        return view("backoffice.dashboard", compact(
            "usersCount",
            "donationCallsCount",
            "donationCallsPerType",
            "donationsCount",
            "eventsCount",
            "donationsTotalCollectedAmount",
            "donationsCollectedAmountLastSevenDays",
            "topDonators",
            "recentDonationCalls"
        ));
    }
}
