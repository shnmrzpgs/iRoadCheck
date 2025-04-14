@props(['label', 'name', 'type' => 'text', 'required' => false])

<div class="flex flex-col">
    <div class="w-full relative">

        <input
            type="{{ $type }}"
            placeholder=" "
            id="{{ $name }}"
            required="{{ $required }}"
            {{ $attributes->merge(['class' => 'w-full py-2 px-4 bg-[#303030] border-x-transparent border-t-transparent border-b-2 border-b-[#757575] rounded-[4px] text-white text-[15px] focus:border-x-transparent focus:border-t-transparent focus:border-b-2 focus:border-b-[#757575] focus:outline-none focus:ring-0 focus:ring-transparent peer']) }}
        />
        <label
            for="{{ $name }}"
            class="absolute left-4 top-[45%] -translate-y-1/2 px-1.5 pb-0.5 pt-1.5 text-[#bdbdbd] text-[15px] pointer-events-none transition-all duration-200 ease-in-out rounded peer-focus:-top-1 peer-focus:left-2 peer-focus:text-[14px] peer-focus:text-[#929292] peer-focus:font-bold peer-[:not(:placeholder-shown)]:-top-1 peer-[:not(:placeholder-shown)]:left-2 peer-[:not(:placeholder-shown)]:text-[14px] peer-[:not(:placeholder-shown)]:text-[#929292] peer-[:not(:placeholder-shown)]:font-bold"
        >
            {{ $label }}
        </label>

    </div>

    <div>
        @if(isset($attributes['wire:model.live']))
            @error($attributes['wire:model.live'])
            <span class="w-full text-center text-red-400 text-xs mt-1 block">{{ $message }}</span>
            @enderror
        @else
            @error($name)
            <span class="w-full text-center text-red-400 text-xs mt-1 block">{{ $message }}</span>
            @enderror
        @endif
    </div>
</div>
