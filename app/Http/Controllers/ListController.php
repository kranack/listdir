<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Testing\MimeType;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ListController extends Controller
{
  public function show(string $path = null) : View|BinaryFileResponse
  {
    $folder = $root = env('DIRECTORY_FOLDER');

    if ($path) {
      $folder = sprintf('%s/%s', $folder, $path);
    }

    if (!$folder || !file_exists($folder)) return view('404');

    $type = filetype($folder);

    if ($type === 'dir') {
      return view('list.index', [
        'root'          => rtrim(str_replace($root, '', $folder), '/') . '/',
        'files'         => array_map(fn($file) => (object) [ 'path' => $file, 'type' => filetype($file), 'name' => basename($file), 'mime' => MimeType::from($file) ], glob(sprintf('%s/*', $folder))),
        'has_previous'  => !!$path
      ]);
    } else {
        // Download
        return response()->download($folder);
    }

  }
}
