<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lite:Ray</title>
  {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
  <script>
    tailwind.config = {}
  </script>
</head>

<body class="font-sans text-base text-slate-700 bg-slate-50">
  {{ $slot }}
</body>

</html>
