<!--Шаблон для вывода меню с использованием рекурсии-->
@foreach($items as $item)
    <!--Добавляем класс active для активного пункта меню-->
       <a href="#">{{ $item->title }}</a>
    @if($item->hasChildren())
        <ul class="sub-menu">
           @include('pages.test', ['items'=>$item->children()])
        </ul>
    @endif

@endforeach
