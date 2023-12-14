<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VOD Calesse</title>

    <link rel="icon" href="/favicon.svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" />

    <style type="text/css">
      body {
        height: 100vh;
      }

      .logo {
        display: flex;
        justify-content: center;
        content-visibility: auto;
      }

      .logo > figure {
        height: 250px;
        width: 250px;
      }

      .viewer {
        border-radius: 5px;
        padding: 10px;
      }

      .viewer-controls {
        border-bottom: 1px dashed;
        margin-bottom: 5px;
        padding-bottom: 1px;
      }

    </style>
  </head>
  <body>
    <section class="section">
      <div class="columns is-centered">
        <div class="column is-narrrow logo">
          <figure class="image">
            <img src="{{ asset('/logos/damien_vod.png') }}" loading="async">
          </figure>
        </div>
      </div>
      <div class="container viewer">
        <div class="viewer-controls">
          @if ($has_previous)
            <a href="{{ dirname($root) }}">
              <span class="icon">
                <i class="fas fa-arrow-left"></i>
              </span>
            </a>
          @endif
        </div>
        @foreach ($files as $file)
          <div>
            <a href="{{ $root }}{{ $file->name }}">
              <span class="icon-text">
                <span class="icon">
                  <i class="fas fa-{{ $file->type === 'dir' ? 'folder' : ( strpos($file->mime, 'video/') === 0 ? 'film' : 'file') }}"></i>
                </span>
                {{ $file->name }}
              </span>
            </a>
          </div>
        @endforeach
      </div>
    </section>
  </body>
</html>
