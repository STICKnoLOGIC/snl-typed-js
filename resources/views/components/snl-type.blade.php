@if(!empty($snlTypeScripts))
    @once
        <script src="https://cdn.jsdelivr.net/gh/sticknologic/typed.js@main/dist/typed.umd.js" defer></script>
    @endonce
@endif

<div style="font-size:{{$fontSize ?? '1rem' }}; width:100%; color:{{ $color ?? 'inherit' }}">
    <span id="{{ $id }}"></span>
</div>

<script>
    new Typed("#{{$id}}", {
  strings: {{ $strings }},
  typeSpeed: {{ $typeSpeed ?? 60 }},
  startDelay: {{ $startDelay ?? 0 }},
  backSpeed: {{ $backSpeed ?? 60 }},
  backDelay: {{ $backDelay ?? 700 }},
  smartBackspace: {{ $smartBack ?? true }},
  shuffle: {{ $shuffle ?? false }},
  loop: {{ $loop ?? false }},
  showCursor: {{ $showCursor ?? true }},
  cursorChar: "{{ $cursor ?? '|' }}",
});
</script>
