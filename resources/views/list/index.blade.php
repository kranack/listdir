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
      html {
        overflow: hidden;
      }

      body {
        height: 100vh;
      }

      section.section {
        height: calc(100% - 9rem);
        overflow-y: auto;
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
        display: flex;
        justify-content: space-between;

        border-bottom: 1px dashed;
        margin-bottom: 5px;
        padding-bottom: 1px;
      }

      .viewer-item {
        display: flex;
        justify-content: space-between;
      }
    </style>
    <script type="text/javascript" async>
      addEventListener("DOMContentLoaded", () => {
        const copyToClipboardEls = document.querySelectorAll('a#copyToClipboard')

        if (!copyToClipboardEls.length) return;

        copyToClipboardEls.forEach(copyToClipboardEl => {
          copyToClipboardEl.addEventListener('click', (e) => {
            e.preventDefault()
            const url = e.currentTarget.parentElement.parentElement.firstElementChild.href || ''
            navigator.clipboard.writeText(url)
          })
        })
      });
    </script>
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
            <a href="/">
              <span class="icon">
                <i class="fas fa-home"></i>
              </span>
            </a>
          @endif
        </div>
        @foreach ($files as $file)
          <div class="viewer-item">
            <a href="{{ $root . $file->name }}">
              <span class="icon-text">
                <span class="icon">
                  <i class="fas fa-{{ $file->type === 'dir' ? 'folder' : ( strpos($file->mime, 'video/') === 0 ? 'film' : 'file') }}"></i>
                </span>
                {{ $file->name }}
              </span>
            </a>
            <div>
              <a id="copyToClipboard">
                <span class="icon" aria-label="copy">
                  <i class="fas fa-clipboard"></i>
                </span>
              </a>
              <a href="/zip{{ $root . $file->name }}">
                <span class="icon">
                  <i class="fas fa-file-zipper"></i>
                </span>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </section>
    <footer class="footer">
      <div class="content has-text-centered">
        <p>
          <a href="https://github.com/kranack/listdir">
            <span class="icon-text">
              <span class="icon">
                <i class="fab fa-github"></i>
              </span>
              <span>Github</span>
            </span>
          </a>
        </p>
      </div>
    </footer>
  </body>
</html>
