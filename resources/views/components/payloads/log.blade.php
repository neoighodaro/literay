<div class="py-3">
  @foreach ($payload->content as $content)
  <div class="p-2 bg-slate-100 rounded-md text-xs text-slate-700">
    {!! $content !!}
  </div>
  @endforeach
  <div class="pt-1">
    <span class="text-xs">
      <a class="text-slate-400 hover:text-slate-600 underline"
{{--        href="vscode://file/{{ $payload->origin['file'] }}:{{ $payload->origin['line_number'] }}"--}}
        href="phpstorm://open?file={{ $payload->origin['file'] }}&line={{ $payload->origin['line_number'] }}"
      >
        {{ basename($payload->origin['file']) }}:{{ $payload->origin['line_number'] }}
      </a>
    </span>
  </div>
</div>
