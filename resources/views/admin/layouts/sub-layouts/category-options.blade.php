@foreach($categories as $categoryObj)
    <option value="{{ $categoryObj->id }}"
            @isset($category)
            @if($category->parent_id == $categoryObj->id)
            selected
            @elseif($category->id == $categoryObj->id)
            disabled
        @endif
        @endisset
    >
        {{ $delimiter ?? '' }} {{ $categoryObj->title }}
    </option>
    @isset($categoryObj->children)
        @include('admin.layouts.sub-layouts.category-options', [
    'categories' => $categoryObj->children,
    'delimiter' => '-' . $delimiter,
    ])
    @endisset
@endforeach
