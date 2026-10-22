@props([
    'name',
    'label',
    'icon' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
])

<div>
    <label for="{{ $name }}" class="block text-xs text-slate-400 mb-1 flex items-center gap-2">
        @if($icon)
            <i class="{{ $icon }} text-slate-500" aria-hidden="true"></i>
        @endif
        <span>{{ $label }}</span>
    </label>
    @if($type === 'textarea')
        <textarea id="{{ $name }}" name="{{ $name }}" rows="3" placeholder="{{ $placeholder }}" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ old($name, $value) }}</textarea>
    @elseif($type === 'file')
        <input id="{{ $name }}" type="file" name="{{ $name }}" accept="{{ $placeholder ?? 'image/*' }}" class="w-full text-slate-300">
    @else
        <div class="relative">
            @if($icon)
                <i class="{{ $icon }} absolute left-3 top-1/2 -translate-y-1/2 text-slate-500" aria-hidden="true"></i>
            @endif
            <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}"
                class="w-full {{ $icon ? 'pl-10' : 'px-4' }} py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
        </div>
    @endif
</div>