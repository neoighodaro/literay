<div>
    <div class="p-2 bg-slate-100 rounded-md text-xs text-slate-700">
        {{ $payload->model }}
    </div>
    <div class="px-2 pb-2 bg-slate-100 rounded-md text-xs text-slate-700">
        <h3 class="pl-1 font-medium">Attributes</h3>
        <div>{!! $payload->attributes !!}</div>
    </div>
    <div class="px-2 bg-slate-100 rounded-md text-xs text-slate-700">
        <h3 class="pl-1 font-medium">Relationships</h3>
        <div>{!! $payload->relations !!}</div>
    </div>
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
