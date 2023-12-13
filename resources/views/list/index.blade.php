<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  </head>
  <body class="has-background-white-bis" style="height: 100vh">
    <section class="section">
      <div class="container has-background-warning-light" style="border-radius: 5px; padding: 10px">
        @foreach ($files as $file)
          <div>
            <a href="{{ $root }}{{ $file->name }}">
              <span class="icon-text">
              <span class="icon">
                <i class="fas fa-{{ $file->type === 'dir' ? 'folder' : 'file' }}"></i>
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
