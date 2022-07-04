@foreach($children as $child)
<nav class="nav nav-pills flex-column">
    <a class="nav-link ml-3 my-1" href="{{ route('posts.category', $child) }}">{{ $delimiter . $child->title }}</a>
    @if($child->children->count() !== 0)
        @include('layouts.sub-layouts.nav', ['children' => $child->children, 'delimiter' => "-$delimiter"])
    @endif
</nav>
@endforeach
