<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Symfony\Component\Process\Process;
// use Symfony\Component\Process\Exception\ProcessFailedException;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query');

        // $output = shell_exec("python query.py indexdb 10 \"{$query}\"");

        // $process = new Process(["$pythonPath $path indexdb 10 \"{$query}\""]);
        // $process->run();

        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }

        $data = cache()->remember("search_{$query}", 60, function () use ($query) {
            $output = shell_exec("python query.py indexdb 10 \"{$query}\"");
            $list_data = array_filter(explode("\n", $output));

            return array_map(function($data) {
                return json_decode(trim(str_replace('▶', '', $data)), true);
            }, $list_data);
        });


        return view('search', [
            'query' => $query,
            'data' => $data
        ]);
    }
}
