<div class="py-2 space-y-1 divide-y divide-dashed divide-slate-200">
  @foreach ($item->payloads as $payload)
  <x-dynamic-component :component="'literay-payloads-' . $payload->type" :payload="$payload" />
  @endforeach
</div>
