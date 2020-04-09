

@if(\Illuminate\Support\Facades\Auth::user()->role == "admin")


    {{-- <li class="{{ Request::is('areas*') ? 'active' : '' }}">
        <a href="{{ route('areas.index') }}"><i class="fa fa-edit"></i><span>Areas</span></a>
    </li> --}}

    {{-- <li class="{{ Request::is('tests*') ? 'active' : '' }}">
        <a href="{{ route('tests.index') }}"><i class="fa fa-edit"></i><span>Tests</span></a>
    </li> --}}

    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
    </li>

    <li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
        <a href="{{ route('suppliers.index') }}"><i class="fa fa-edit"></i><span>Suppliers</span></a>
    </li>

    <li class="{{ Request::is('serviceTypes*') ? 'active' : '' }}">
        <a href="{{ route('serviceTypes.index') }}"><i class="fa fa-edit"></i><span>Service Types</span></a>
    </li>

    {{-- <li class="{{ Request::is('orderstatuses*') ? 'active' : '' }}">
        <a href="{{ route('orderstatuses.index') }}"><i class="fa fa-edit"></i><span>Orderstatuses</span></a>
    </li> --}}

    {{-- <li class="{{ Request::is('import*') ? 'active' : '' }}">
        <a href="{{ route('import_csv') }}"><i class="fa fa-edit"></i><span>Import Data</span></a>
    </li> --}}
    <li class="{{ Request::is('data*') ? 'active' : '' }}">
        <a href="{{ route('data.index') }}"><i class="fa fa-edit"></i><span>Imported Orders</span></a>
    </li>

    <li class="{{ Request::is('orders*') ? 'active' : '' }}">
        <a href="{{ route('orders.index') }}"><i class="fa fa-edit"></i><span>Distributed Orders</span></a>
    </li>


    <li>
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-edit"></i><span>Settings</span>
        </a>
        <ul class="collapse sidebar-menu " id="pageSubmenu"  data-widget="tree">
            
            <li class="{{ Request::is('divisions*') ? 'active' : '' }} pageSubmenu_item">
                <a href="{{ route('divisions.index') }}"><i class="fa fa-edit"></i><span>Divisions</span></a>
            </li>

            <li class="{{ Request::is('districts*') ? 'active' : '' }} pageSubmenu_item">
                <a href="{{ route('districts.index') }}"><i class="fa fa-edit"></i><span>Districts</span></a>
            </li>
            {{-- <li class="{{ Request::is('thanas*') ? 'active' : '' }}">
                <a href="{{ route('thanas.index') }}"><i class="fa fa-edit"></i><span>Thanas</span></a>
            </li> --}}

            <li class="{{ Request::is('unions*') ? 'active' : '' }} pageSubmenu_item">
                <a href="{{ route('unions.index') }}"><i class="fa fa-edit"></i><span>Unions</span></a>
            </li>


            <li class="{{ Request::is('upazillas*') ? 'active' : '' }} pageSubmenu_item">
                <a href="{{ route('upazillas.index') }}"><i class="fa fa-edit"></i><span>Upazillas</span></a>
            </li>
        </ul>
    </li>

    
    

    

    
@else
    <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
        <a href="{{ route('supplier.dashboard2') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
    </li>

    <li class="{{ Request::is('supplier/orders*') ? 'active' : '' }}">
        <a href="{{ route('supplier.orders') }}"><i class="fa fa-edit "></i><span>Orders</span></a>
    </li>
    <li class="{{ Request::is('supplier/order-summery*') ? 'active' : '' }}">
        <a href="{{ route('supplier.order_summery') }}"><i class="fa fa-edit "></i><span>Order summery</span></a>
    </li>
    <li class="{{ Request::is('supplier/settings*') ? 'active' : '' }}">
        <a href="{{ route('supplier.dashboard') }}"><i class="fa fa-gear"></i><span>Settings</span></a>
    </li>
@endif





