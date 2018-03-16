<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">

                    @if($menu)
                    <div class="menu-container">
                        <div class="menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                @include('pages.customMenuItems', ['items'=>$menu->roots()])
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

