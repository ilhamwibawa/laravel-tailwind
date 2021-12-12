@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
      @php
        switch ($message['level']) {
          case 'danger':
            $levelClass = 'bg-red-500';
            break;
          case 'info':
            $levelClass = 'bg-blue-500';
            break;
          case 'success':
            $levelClass = 'bg-green-500';
            break;
          case 'warning':
            $levelClass = 'bg-yellow-500';
            break;

          default:
            $levelClass = 'bg-gray-500';
            break;
        }
      @endphp
        <div class="ptext-white px-6 py-4 border-0 rounded relative mb-4 text-white {{ $levelClass }}
          {{ $message['important'] ? 'alert-important' : '' }}"
          role="alert"
          id="generalAlert"
        >
          <span class="text-xl inline-block mr-5 align-middle">
            <i class="fas fa-bell"></i>
          </span>
          <span class="inline-block align-middle mr-8">
            {!! $message['message'] !!}
          </span>
            @if ($message['important'])
                <button type="button"
                        class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none js-closeAlert"
                        aria-hidden="true"
                >&times;</button>
            @endif
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
