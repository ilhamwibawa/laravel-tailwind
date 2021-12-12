<div {{ $attributes->merge(['class' => '']) }}>
  <label for="{{$id}}" class="inline-block mb-2 text-sm">
    {{ $label }}
    @if ($isRequired)
      <span class="text-red-500">*</span>
    @endif
  </label>
  <input
    type="{{ $type }}"
    name="{{$name}}"
    id="{{$id}}"
    class="appearance-none relative block w-full px-3 py-2 border rounded border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm focus:z-10 {{$disabled ? 'bg-gray-200 cursor-not-allowed' : ''}} @error($name) border-red-500 @enderror"

    {{ $disabled ? 'disabled=true' : ''}}

    @if ($value !== null && $value !== '')
      value="{{ $value }}"
    @else
      value="{{ old($name) }}"
    @endif

    {{ $isRequired ? 'required' : '' }}
    >
    @if ($hintText)
      <span class="text-xs text-gray-500">{{$hintText}}</span>
    @endif

  @error($name)
    <p class="text-red-500 text-xs italic">
      {{ $message }}
    </p>
  @enderror
</div>
