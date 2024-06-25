<?php

namespace App\Helper;

class PaginationHelper
{
    public static function paginationWindow($currentPage, $totalPages)
    {
        $onEachSide = 3; // Number of links on each side of the current page
        $window = [];

        // Previous and next ranges
        $start = max($currentPage - $onEachSide, 1);
        $end = min($currentPage + $onEachSide, $totalPages);

        // Window for pagination
        for ($i = $start; $i <= $end; $i++) {
            $window[] = $i;
        }

        // Add ellipses and edges
        $pagination = [];
        if ($start > 1) {
            $pagination[] = 1;
            if ($start > 2) {
                $pagination[] = '...';
            }
        }
        $pagination = array_merge($pagination, $window);
        if ($end < $totalPages) {
            if ($end < $totalPages - 1) {
                $pagination[] = '...';
            }
            $pagination[] = $totalPages;
        }

        return $pagination;
    }

}
