<div class="py-3 space-y-1 divide-y divide-dashed divide-slate-200">
    <div class="flex w-full space-x-3">
        <div class="text-xs text-slate-600 mt-0.5">{{ $item->date->format('d.M - H:i') }}</div>
        <div class="flex-1">
          @foreach ($item->payloads as $payload)
          <x-dynamic-component :component="'literay-payloads-' . $payload->type" :payload="$payload" />
          @endforeach
        </div>
    </div>
</div>
