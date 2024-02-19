<ul class="menu">
            <li class="sidebar-title">Menu</li>
            @php
                $currentRoute = request()->route()->getName();
            @endphp
            <li
                class="sidebar-item {{ $currentRoute == 'index' ? 'active' : '' }} ">
                <a href="{{route('index')}}" class='sidebar-link {{ $currentRoute == 'index' ? 'bg-warning' : '' }}'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Ana Sayfa</span>
                </a>
            </li>
            
            <li
                class="sidebar-item {{ $currentRoute == 'product' ? 'active' : '' }} ">
                <a href="{{route('product')}}" class='sidebar-link {{ $currentRoute == 'product' ? 'bg-warning' : '' }} '>
                    <i class="bi bi-stack"></i>
                    <span>Ürün Ekle</span>
                </a>
            </li>

            <li
                class="sidebar-item {{ $currentRoute == 'sales' ? 'active' : '' }} ">
                <a href="{{route('sales')}}" class='sidebar-link {{ $currentRoute == 'sales' ? 'bg-warning' : '' }}'>
                    <i class="bi bi-basket-fill"></i>
                    <span>Satış</span>
                </a>
            </li>



            <li class="sidebar-title">Filtreleme</li>

            <li
                class="sidebar-item {{ $currentRoute == 'date_filter' ? 'active' : '' }} ">
                <a href="{{route('date_filter')}}" class='sidebar-link {{ $currentRoute == 'date_filter' ? 'bg-warning' : '' }}'>
                    <i class="bi bi-calendar-date-fill"></i>
                    <span>Tarih Filtrele  </span>
                </a>    
               
            </li>
            
            <li
                class="sidebar-item {{ $currentRoute == 'product_filter' ? 'active' : '' }} ">
                <a href="{{route('product_filter')}}" class='sidebar-link {{ $currentRoute == 'product_filter' ? 'bg-warning' : '' }}'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Ürün Filtrele  </span>
                </a>    
               
            </li>

            <li
                class="sidebar-item {{ $currentRoute == 'last_month' ? 'active' : '' }} ">
                <a href="{{route('last_month')}}" class='sidebar-link {{ $currentRoute == 'last_month' ? 'bg-warning' : '' }}'>
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Önceki Ay Takip</span>
                </a>    
               
            </li>

            <li
                class="sidebar-item {{ $currentRoute == 'monthly' ? 'active' : '' }} ">
                <a href="{{route('monthly')}}" class='sidebar-link {{ $currentRoute == 'monthly' ? 'bg-warning' : '' }}'>
                    <i class="bi bi-grid-1x2-fill text-secondary"></i>
                    <span>Aylık Gelir Takip </span>
                </a>    
               
            </li>

            <li class="sidebar-title">Not</li>

            <li
                class="sidebar-item {{ $currentRoute == 'notes' ? 'active' : '' }} ">
                <a href="{{route('notes')}}" class='sidebar-link {{ $currentRoute == 'notes' ? 'bg-warning' : '' }}'>
                <i class="bi bi-journal-bookmark-fill"></i>
                    <span>Notlar  </span>
                </a>
               
            </li>

            
                
</ul>