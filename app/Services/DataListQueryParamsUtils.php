<?php

namespace App\Services;

use Illuminate\Support\Facades\Request;

class DataListQueryParamsUtils
{
    /**
     * Checks whether a request query key whose value is an array contains a given value.
     */
    public function queryArrayHas(string $key, string $value)
    {
        return in_array($value, request()->input($key, []));
    }

    /**
     * Returns a URL query string for the given sort parameters.
     *
     * @param string $sortBy The column to sort by
     * @param string $order The sort order (asc or desc)
     * @param int $pageSize The page size
     * @return string The URL query string
     */
    public function getSortParamURL(string $sortBy, string $order, ?int $pageSize = null): string
    {
        $query = [
            "sort_by" => $sortBy,
            "order" => $order,
            "page" => 1,
        ];
        if ($pageSize) {
            $query["limit"] = $pageSize;
        }

        return request()->fullUrlWithQuery($query);
    }

    /**
     * Checks whether the current request query matches the given sort parameters.
     *
     * @param string $sortBy The column to sort by
     * @param string $order The sort order (asc or desc)
     * @param mixed $default The default query params value for the sort: "sort_by" and "order"
     * @return bool Whether the current query matches the given sort parameters
     */
    public function matchesSortQuery(string $sortBy, string $order, array $defaultQuery): bool
    {
        $querySortBy = Request::query("sort_by") ?? $defaultQuery["sort_by"];
        $queryOrder = Request::query("order") ?? $defaultQuery["order"];

        return $querySortBy === $sortBy && $queryOrder === $order;
    }
}
