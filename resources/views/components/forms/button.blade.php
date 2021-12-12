@if ($type === 'link')
    <a href="{{$href}}" {{ $attributes->merge(['class' => 'group relative inline-block text-center justify-center py-1 px-2 border border-transparent text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2']) }}>{{$label}}</a>
@else
    <div>
        <button type="{{$type}}" {{ $attributes->merge(['class' => 'group relative text-center inline-block justify-center py-1 px-2 border border-transparent text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2']) }}>
        {{$label}}
        </button>
    </div>
@endif
