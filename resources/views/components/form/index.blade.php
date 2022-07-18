<form action="{{ $action }}" method="{{ $method }}">
    @if($method == 'post') @csrf @endif
    {{ $slot }}
</form>
