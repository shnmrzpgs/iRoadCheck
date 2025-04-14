@props(['label', 'name', 'type' => 'text', 'required' => false, 'options', 'owner_identifier' => ''])

<div x-data="{ open: false, selectedOption: '', selectedOptionValue: '' }"
     @mousedown.away="open = false"
     class=" w-full flex flex-col">
    <div class="w-full relative">
        <input
            x-model="selectedOption"
            x-ref="{{ $name }}"
            type="{{ $type }}"
            placeholder=" "
            id="{{ $name }}"
            required="{{ $required }}"
            readonly
            class="hidden"
            {{ $attributes }}
        />
        <input
            x-model="selectedOptionValue"
            id="{{ $name }}-display"
            placeholder=" "
            @click="open = !open"
            readonly
            class="w-full py-2 px-4 bg-[#303030] border-x-transparent border-t-transparent border-b-2 border-b-[#757575] rounded-[4px] text-white text-[15px] focus:border-x-transparent focus:border-t-transparent focus:border-b-2 focus:border-b-[#757575] focus:outline-none focus:ring-0 focus:ring-transparent peer cursor-default"
        />
        <label
            for="{{ $name }}-display"
            class="absolute left-4 top-[45%] -translate-y-1/2 px-1.5 pb-0.5 pt-1.5 text-[#bdbdbd] text-[15px] pointer-events-none transition-all duration-200 ease-in-out rounded peer-focus:-top-1 peer-focus:left-2 peer-focus:text-[14px] peer-focus:text-[#929292] peer-focus:font-bold peer-[:not(:placeholder-shown)]:-top-1 peer-[:not(:placeholder-shown)]:left-2 peer-[:not(:placeholder-shown)]:text-[14px] peer-[:not(:placeholder-shown)]:text-[#929292] peer-[:not(:placeholder-shown)]:font-bold"
        >
            {{ $label }}
        </label>

        <svg
            @click="open = !open"
            class="absolute text-white right-2 top-1/2 transform -translate-y-1/2 w-3 h-3 transition-transform"
            :class="{ 'rotate-180': open }" fill="none"
            stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>

        <div x-cloak
             x-show="open"
             class="absolute bg-[#404040] top-10 w-full rounded shadow-lg z-[1000] text-white max-h-96 overflow-y-scroll">
            <ul>
                @php
                    $event_name = $owner_identifier.$name;
                @endphp
                @foreach($options as $option)
                    <li x-on:click=
                            "
                                selectedOption = '{{ $option->id }}';
                                $refs.{{ $name }}.value = '{{ $option->id }}';
                                $refs.{{ $name }}.dispatchEvent(new Event('input'));
                                selectedOptionValue = '{{ ucfirst($option->value) }}';
                                open = false;
                            "
                        x-on:clear.window=
                            "
                                selectedOption = '';
                                $refs.{{ $name }}.value = '';
                                $refs.{{ $name }}.dispatchEvent(new Event('input'));
                                selectedOptionValue = '';
                            "
                        x-on:{{ $event_name.'_force_clear' }}.window=
                            "
                                selectedOption = '';
                                $refs.{{ $name }}.value = '';
                                $refs.{{ $name }}.dispatchEvent(new Event('input'));
                                selectedOptionValue = '';
                            "
                        x-on:{{ $event_name.'_cleared' }}.window="selectedOptionValue = '';"
                        x-on:{{ $event_name.'_force_update' }}.window=
                            "
                                console.log('test');
                                if ($event.__livewire.params[0] !== undefined && '{{ $option->id }}' == $event.__livewire.params[0]) {
                                    $refs.{{ $name }}.value ='{{ $option->id }}';
                                    $refs.{{ $name }}.dispatchEvent(new Event('input'));
                                    selectedOptionValue = '{{ ucfirst($option->value) }}';
                                }
                            "
                        x-on:{{ $event_name.'_updated' }}.window=
                            "
                                if ('{{ $option->id }}' == $wire.{{ $attributes['wire:model.live'] }}) {
                                    selectedOptionValue = '{{ ucfirst($option->value) }}';
                                }
                                if ($event.__livewire.params[0] !== undefined) {
                                    selectedOptionValue = $event.__livewire.params[0];
                                }
                            "
                        class="p-2 hover:bg-[#303030] cursor-pointer border border-x-transparent border-t-transparent border-b-gray-500">
                        {{ ucfirst($option->value) }}
                    </li>
                @endforeach
            </ul>
        </div>
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
