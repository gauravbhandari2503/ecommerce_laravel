@if ($category->children)
    <li class="dropdown-submenu">
    <a class="dropdown-item dropdown-toggle" href="{{ route('categorySearch', $category->name) }}">{{ $category->name }}</a>
    @foreach ($category->children as $childCategory)      
        <ul class="dropdown-menu">
        @include('partials/subcategory-navbar', ['category' => $childCategory])
        </ul>
    </li>
    @endforeach
@else
    <li><a class="dropdown-item" href="{{ route('categorySearch', $category->name) }}">{{ $category->name }}</a></li>
@endif