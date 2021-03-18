<ul>
@foreach($childs as $child)
    <li>
 <a href="{{{  url('search/?category='.$child->category_name.'-'.$child->id.'&q=') }}}">{{{ $child->category_name }}}</a>
 @if(count($child->childs))
 @include('admin.managechild',['childs' => $child->childs])
 @endif
  </li>
@endforeach
</ul>