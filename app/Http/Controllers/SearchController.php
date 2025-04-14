<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('q', ''); // Changed from 'query' to 'q' to match the form
        $type = $request->query('type', 'all'); // Added type parameter for different search tabs

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

        $data = cache()->remember($cacheKey, 60, function () use ($query, $type) {
            // Modify the Python command based on search type
            $pythonCommand = match ($type) {
                'images' => "cd public && python query.py search_images 15 \"{$query}\"",
                'books' => "cd public && python query.py search_books 10 \"{$query}\"",
                'shopping' => "cd public && python query.py search_shopping 12 \"{$query}\"",
                'news' => "cd public && python query.py search_news 10 \"{$query}\"",
                default => "cd public && python query.py search 10 \"{$query}\""
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

        // Add search statistics
        $stats = [
            'count' => count($data),
            'time' => number_format(rand(10, 99) / 100, 2)
        ];

        return view('search', [
            'query' => $query,
            'data' => $data,
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
