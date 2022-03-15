<div>
    <div class="p-2 bg-slate-100 rounded-md text-slate-700">
        <pre><code class="language-sql whitespace-normal leading-7" style="background: none">{!! $payload->sql !!}</code></pre>
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
