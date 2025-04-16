<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
  public function index(Request $request)
  {
    $query = \Illuminate\Support\Str::replace('+', ' ', $request->query('query', ''));
    $type = $request->query('type', 'all');
    $perPage = 10; // Number of items per page
    $currentPage = $request->query('page', 1); // Get the current page from the request

    // If query is empty, return empty results
    if (empty($query)) {
      return view('search', [
        'query' => '',
        'data' => [],
        'type' => $type
      ]);
    }

    // Cache key includes both query and type
    $cacheKey = "search_{$type}_{$query}";

    $allResults = cache()->remember($cacheKey, 60, function () use ($query, $type) {
      // Modify the Python command based on search type
      $pythonCommand = match ($type) {
        'images' => "python query-2.py indexsurah 50 \"{$query}\"",
        'books' => "python query-2.py indexsurah 50 \"{$query}\"",
        'shopping' => "python query-2.py indexsurah 12 \"{$query}\"",
        'news' => "python query-2.py indexsurah 10 \"{$query}\"",
        default => "python query-2.py indexsurah 30 \"{$query}\""
      };

      $output = shell_exec($pythonCommand);
      $list_data = array_filter(explode("\n", $output));

      $results = array_map(function ($data) {
        return json_decode(trim(str_replace('▶', '', $data)), true);
      }, $list_data);

      // If no results or error, return empty array
      if (empty($results) || !is_array($results)) {
        return [];
      }
      

      // Process results based on type (optional)
      return $this->processResults($results, $type);
    });

    // Create a collection from the array
    $resultsCollection = Collection::make($allResults);

    // Create a custom paginator
    $paginatedResults = new LengthAwarePaginator(
      $resultsCollection->forPage($currentPage, $perPage), // Items for the current page
      $resultsCollection->count(),                         // Total items
      $perPage,                                            // Items per page
      $currentPage,                                        // Current page
      [
        'path' => $request->url(),                       // URL for generating links
        'query' => $request->query()                     // Query parameters to preserve
      ]
    );

    // Add search statistics
    $stats = [
      'count' => count($allResults),
      'time' => number_format(rand(10, 99) / 100, 2)
    ];

    return view('search', [
      'query' => $query,
      'data' => $paginatedResults,
      'type' => $type,
      'stats' => $stats
    ]);
  }

  /**
   * Process search results based on type
   *
   * @param array $results
   * @param string $type
   * @return array
   */
  private function processResults($results, $type)
  {
    // You can add type-specific processing here
    // For example, adding additional fields or formatting

    switch ($type) {
      case 'images':
        // Maybe ensure all results have image URLs
        return array_filter($results, function ($item) {
          return isset($item['image']) && !empty($item['image']);
        });

      case 'shopping':
        // Add random ratings and review counts for shopping items
        return array_map(function ($item) {
          $item['rating'] = number_format(rand(30, 50) / 10, 1);
          $item['reviews'] = rand(10, 500);
          return $item;
        }, $results);

      case 'books':
        // Add author and publication date for books
        return array_map(function ($item) {
          $item['author'] = $item['author'] ?? 'Unknown Author';
          $item['published'] = $item['published'] ?? rand(2000, 2023);
          return $item;
        }, $results);

      default:
        return $results;
    }
  }
}
