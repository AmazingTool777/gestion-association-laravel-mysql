<?php

namespace App\Http\Controllers;

use App\Models\DonationCall;
use Illuminate\Http\Request;
use App\Models\DonationCallType;

class DonationCallController extends Controller
{
    public function index(Request $request)
    {
        // Sort
        $defaultSort = [
            "sort_by" => "created_at",
            "order" => "desc"
        ];
        $sortBy = $request->query("sort_by", $defaultSort['sort_by']);
        $order = $request->query("order", $defaultSort['order']);

        $query = DonationCall::with("type")->orderBy($sortBy, $order);

        // Text search
        $search = $request->query("q");
        if ($search) {
            $query->whereFullText(['title', 'description'], $search);
        }

        // Type ids filter
        $typeIds = $request->query("type_ids");
        if ($typeIds) {
            $query->whereIn("type_id", $typeIds);
        }

        // Page size
        $limit = $request->query("limit", 10);

        // Query execution
        $results = $query->paginate($limit);

        $donationCallTypes = DonationCallType::get();

        return view(
            'donation-calls',
            compact(
                "donationCallTypes",
                "defaultSort",
                "results"
            )
        );
    }
}
