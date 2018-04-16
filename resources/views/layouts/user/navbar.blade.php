<!-- START NAVBAR -->
<div class="nav-bar">
    <div class="left">
        <a href="" class="hamburger">
            <img src="{{ asset('img/admin/hamburger.png') }}" />
        </a>
        <a href="" class="logo">
            <img src="{{ asset('img/admin/logo-navbar.png') }}" />
        </a>
    </div>
    <div class="center">
        <p style="color: white; font-weight:600; font-size: 18px;margin: 15px 95px;">Welcome, Jesie Johanes</p>
    </div>
    <div class="right">
        <form class="search">
            <input type="text" placeholder="Search...">
            <button type="submit"><img src="{{ asset('img/admin/icon-search.png') }}" /></button>
        </form>
        <a href="" class="profile">
            <div class="image" style="background-image: url('{{ asset('img/admin/user-profile-image.png') }}')"></div>
        </a>
        <a href="" class="button"><img src="{{ asset('img/admin/icon-finances-2.png') }}" \></a>
        <a href="" class="button"><img src="{{ asset('img/admin/icon-notifications.png') }}" \></a>
        <a href="" class="button"><img src="{{ asset('img/admin/icon-reminders.png') }}" \></a>
    </div>
</div>
<!-- END NAVBAR -->