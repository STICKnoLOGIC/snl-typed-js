@once
    <script src="https://cdn.jsdelivr.net/gh/sticknologic/typed.js@main/dist/typed.umd.js" defer></script>
    <script>
        function initSnlTyped(elementId, options) {
            'use strict';
            
            const init = () => {
                if (typeof Typed === 'undefined') {
                    setTimeout(init, 50);
                    return;
                }
                
                new Typed(elementId, options);
            };
            
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
        }
    </script>
@endonce

@php
    $slotContent = trim($slot ?? '');
    $useSlot = $shouldUseSlot($slotContent);
    $finalStrings = $useSlot ? [] : $strings;
@endphp

<div style="{{ $fontSize ? "font-size: {$fontSize}; " : '' }}{{ $color ? "color: {$color}; " : '' }}width: 100%;">
    <span id="{{ $id }}"></span>
</div>
@if($useSlot)
<span id="snl-{{ $id }}" style="display: none;">
    {!! $slotContent !!}
</span>
@endif

<script>
    initSnlTyped('#{{ $id }}', {
        @if($useSlot)
        stringsElement: '#snl-{{ $id }}',
        @else
        strings: @json($finalStrings),
        @endif
        typeSpeed: {{ $typeSpeed ?? 60 }},
        startDelay: {{ $startDelay ?? 0 }},
        backSpeed: {{ $backSpeed ?? 60 }},
        backDelay: {{ $backDelay ?? 700 }},
        smartBackspace: {{ $smartBackspace ? 'true' : 'false' }},
        shuffle: {{ $shuffle ? 'true' : 'false' }},
        loop: {{ $loop ? 'true' : 'false' }},
        showCursor: {{ $showCursor ? 'true' : 'false' }},
        cursorChar: '{{ $cursor ?? '|' }}'
    });
</script>
