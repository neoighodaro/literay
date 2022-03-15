<x-literay::layout>
  {!! $sfdump !!}

  @include('literay::partials.header')

  <div class="container mx-auto px-4 md:px-0 mt-12">
    <div class="text-sm divide-y divide-dashed divide-slate-400">
      @foreach ($items as $item)
      @unless(empty($item->payloads))
      <x-literay-log-block :item="$item" />
      @endunless
      @endforeach
    </div>
  </div>
</x-literay::layout>
