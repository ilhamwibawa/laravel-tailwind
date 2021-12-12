<div {{ $attributes->merge(["class" => "flex items-center "]) }}>
  <input
    id="{{$id}}"
    name="{{$name}}"
    type="{{$type}}"
    value="{{ $value }}"
    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
    disabled="{{$disabled}}"
    >
  <label for="{{$id}}" class="ml-2 block text-sm text-gray-900">
    {{$label}}
  </label>
</div>
