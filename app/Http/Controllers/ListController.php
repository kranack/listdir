<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Testing\MimeType;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use Zip;

class ListController extends Controller
{

  public function show(string $path = null) : View|BinaryFileResponse
  {
    $folder = $root = env('DIRECTORY_FOLDER');

    if ($path) {
      $folder = sprintf('%s/%s', $folder, $path);
    }

    if (!$folder || !file_exists($folder)) return view('404');

    $type = filetype(realpath($folder));

    if ($type === 'dir') {
      return view('list.index', [
        'root'          => rtrim(str_replace($root, '', $folder), '/') . '/',
        'files'         => array_map(fn($file) => (object) [ 'path' => $file, 'type' => filetype(realpath($file)), 'name' => basename($file), 'mime' => MimeType::from($file) ], glob(sprintf('%s/*', $folder))),
        'has_previous'  => !!$path
      ]);
    } else {
        // Download
        return response()->download($folder);
    }
  }

  public function zip(string $path = null) : View|\STS\ZipStream\ZipStream
  {
    $folder = $root = env('DIRECTORY_FOLDER');

    if ($path) {
      $folder = sprintf('%s/%s', $folder, $path);
    }

    if (!$folder || !file_exists($folder)) return redirect($path);

    // ZIP
    return Zip::create(basename($folder) . '.zip', [ $folder ]);
  }

}
