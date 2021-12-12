<div {{ $attributes->merge(['class' => '']) }}>
    <label for="{{$id}}" class="inline-block mb-2 text-sm">
      {{ $label }}
      @if ($isRequired)
        <span class="text-red-500">*</span>
      @endif
    </label>

    <select name="{{ $name }}" id="{{$id}}" class="selectize" >
        @foreach ($options as $option)
            <option value="{{$option->id}}">{{$option->name}}</option>
        @endforeach
    </select>
</div>

@once
    @push('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.css" integrity="sha512-85w5tjZHguXpvARsBrIg9NWdNy5UBK16rAL8VWgnWXK2vMtcRKCBsHWSUbmMu0qHfXW2FVUDiWr6crA+IFdd1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @endpush
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.min.js" integrity="sha512-7amIsiQ/hxbdPNawBZwmWBWPiwQRNEJlxTj6eVO+xmWd71fs79Iydr4rYARHwDf0rKHpysFxWbj64fjPRHbqfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sifter/0.5.4/sifter.min.js" integrity="sha512-B60IUvYpG4cibCeQ30J8k/+qtN+fxKAIENb3DL2DVdzIt76IDIynAt92chPEwlCuKejOt//+OZL61i1xsvCIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.min.js" integrity="sha512-JiDSvppkBtWM1f9nPRajthdgTCZV3wtyngKUqVHlAs0d5q72n5zpM3QMOLmuNws2vkYmmLn4r1KfnPzgC/73Mw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(function() {
                $('.selectize').selectize()
            });
        </script>
    @endpush
@endonce
