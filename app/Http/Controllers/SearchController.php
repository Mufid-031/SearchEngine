<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query');

        $pythonPath = 'C:\Users\risqi\AppData\Local\Microsoft\WindowsApps\python.exe';
        $path = 'public/query.py';

        $output = shell_exec("python query.py indexdb 10 \"{$query}\"");

        // $process = new Process(["$pythonPath $path indexdb 10 \"{$query}\""]);
        // $process->run();

        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }

        $list_data = array_filter(explode("\n", $output));

        $data = [];

        foreach ($list_data as $book) {
            $cleanedLine = trim(str_replace('▶', '', $book));

            // Abaikan baris kosong
            if (!empty($cleanedLine)) {
                // Coba decode JSON
                $decoded = json_decode($cleanedLine, true);

                // Jika berhasil, tambahkan ke array
                if ($decoded) {
                    $data[] = $decoded;
                }
            }
        }

        return view('search', [
            'query' => $query,
            'book' => $data
        ]);
    }
}
