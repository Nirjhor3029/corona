

@if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
<li class="{{ Request::is('import*') ? 'active' : '' }}">
    <a href="{{ route('import_csv') }}"><i class="fa fa-edit"></i><span>Import Data</span></a>
</li>
<li class="{{ Request::is('data*') ? 'active' : '' }}">
    <a href="{{ route('data.index') }}"><i class="fa fa-edit"></i><span>Data</span></a>
</li>

<li class="{{ Request::is('areas*') ? 'active' : '' }}">
    <a href="{{ route('areas.index') }}"><i class="fa fa-edit"></i><span>Areas</span></a>
</li>

<li class="{{ Request::is('tests*') ? 'active' : '' }}">
    <a href="{{ route('tests.index') }}"><i class="fa fa-edit"></i><span>Tests</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
    <a href="{{ route('suppliers.index') }}"><i class="fa fa-edit"></i><span>Suppliers</span></a>
</li>

<li class="{{ Request::is('serviceTypes*') ? 'active' : '' }}">
    <a href="{{ route('serviceTypes.index') }}"><i class="fa fa-edit"></i><span>Service Types</span></a>
</li>

<li class="{{ Request::is('orderstatuses*') ? 'active' : '' }}">
    <a href="{{ route('orderstatuses.index') }}"><i class="fa fa-edit"></i><span>Orderstatuses</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{{ route('orders.index') }}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>


    
@else
<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{{ route('supplier.dashboard') }}"><i class="fa fa-edit"></i><span>Dashboard</span></a>
</li>
<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{{ route('supplier.orders') }}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>
@endif



