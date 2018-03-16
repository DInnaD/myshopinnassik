<!--Шаблон для вывода меню с использованием рекурсии-->
@foreach($items as $item)
    <!--Добавляем класс active для активного пункта меню-->
    <li {{ (URL::current() == $item->url()) ? "class=active" : '' }}>
        <!-- метод url() получает ссылку на пункт меню (указана вторым параметром
        при создании объекта LavMenu)-->
        <a href="{{ $item->url() }}">{{ $item->title }}</a>
        <!--Формируем дочерние пункты меню
        метод haschildren() проверяет наличие дочерних пунктов меню-->
        @if($item->hasChildren())
            <ul>
                <!--метод children() возвращает дочерние пункты меню для текущего пункта-->
                @include('pages.customMenuItems', ['items'=>$item->children()])
            </ul>
        @endif
    </li>
@endforeach