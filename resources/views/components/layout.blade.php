<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lite:Ray</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
  <script src="//cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
  <script>
    hljs.highlightAll();
    tailwind.config = {}
  </script>
</head>

<body class="font-sans text-base text-slate-700 bg-white">
  {{ $slot }}
</body>

</html>
