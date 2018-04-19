<!-- START SIDEBAR -->
<div class="sidebar">
    <section class="logo">
        <img src="{{ asset('img/admin/logo-sidebar.png') }}" />
    </section>

    <section>
        <div class="category">
            <span class="icon"><img src="{{ asset('img/admin/icon-properties.png') }}" /></span>
            <span class="title">Properties</span>
            <span class="chevron"><img src="{{ asset('img/admin/arrow.png') }}" /></span>
        </div>
        <div class="links">
            <a href="{{ route('admin.property-list') }}">Property List</a>
            <a href="{{ route('admin.display-property') }}">Add Property</a>
            <a href="{{ route('admin.list-rented-property') }}">Rented Properties</a>
            <a href="{{ route('admin.list-free-property') }}">Vacant Properties</a>
            <a href="">Property Finances</a>
        </div>
    </section>

    <section>
        <div class="category">
            <span class="icon"><img src="{{ asset('img/admin/icon-tenants.png') }}" /></span>
            <span class="title">Tenants</span>
            <span class="chevron"><img src="{{ asset('img/admin/arrow.png') }}" /></span>
        </div>
        <div class="links">
            <a href="{{ route('admin.tenant-list') }}">Tenant List</a>
            <a href="{{ route('admin.add-tenant') }}">Add Tenant</a>
            <a href="">Tenant Payments</a>
        </div>
    </section>

    <section>
        <div class="category">
            <span class="icon"><img src="{{ asset('img/admin/icon-finances.png') }}" /></span>
            <span class="title">Finances</span>
            <span class="chevron"><img src="{{ asset('img/admin/arrow.png') }}" /></span>
        </div>
        <div class="links">
            <a href="">Reports</a>
            <a href="">View Outstanding Rent</a>
            <a href="">Download CSV</a>
        </div>
    </section>

    <section>
        <div class="category">
            <span class="icon"><img src="{{ asset('img/admin/icon-support.png') }}" /></span>
            <span class="title">Support</span>
            <span class="chevron"><img src="{{ asset('img/admin/arrow.png') }}" /></span>
        </div>
        <div class="links">
            <a href="">Reports</a>
            <a href="">View Closed Tickets</a>
        </div>
    </section>

    <section>
        <div class="category">
            <span class="icon"><img src="{{ asset('img/admin/icon-reminders.png') }}" /></span>
            <span class="title">Reminders</span>
            <span class="chevron"><img src="{{ asset('img/admin/arrow.png') }}" /></span>
        </div>
        <div class="links">
            <a href="">View All Reminders</a>
            <a href="">Setup Reminders</a>
            <a href="">View Calendar</a>
        </div>
    </section>

    <section>
        <div class="category">
            <span class="icon"><img src="{{ asset('img/admin/icon-setup.png') }}" /></span>
            <span class="title">Setup</span>
            <span class="chevron"><img src="{{ asset('img/admin/arrow.png') }}" /></span>
        </div>
        <div class="links">
            <a href="">View/Add Your Details</a>
            <a href="">Add New Admin</a>
        </div>
    </section>

    <section class="footer">

    </section>
</div>
<!-- END SIDEBAR -->