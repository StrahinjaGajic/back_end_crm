<!-- START NAVBAR -->
<div class="nav-bar">
    <div class="top">
        <div class="left">
            <a href="javascript:void(0);" class="hamburger">
                <img src="{{ asset('img/admin/hamburger.png') }}" />
            </a>
            <a href="" class="logo">
                <img src="{{ asset('img/admin/logo-navbar.png') }}" />
            </a>
        </div>
        <div class="right">
            <form class="search">
                <button type="submit"><img src="{{ asset('img/admin/icon-search.png') }}" /></button>
                <input type="text" placeholder="Search...">
            </form>
            <div class="buttons">
                <a href="" class="profile">
                    <div class="image" style="background-image: url('{{ asset('img/admin/user-profile-image.png') }}')"></div>
                </a>
                <a href="" class="button"><img src="{{ asset('img/admin/icon-finances-2.png') }}" \></a>
                <a href="" class="button"><img src="{{ asset('img/admin/icon-notifications.png') }}" \></a>
                <a href="" class="button"><img src="{{ asset('img/admin/icon-reminders.png') }}" \></a>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="left">
            <a href="" class="profile">
                <div class="image" style="background-image: url('{{ asset('img/admin/user-profile-image.png') }}')"></div>
            </a>
        </div>
        <div class="right">
            <a href="" class="button"><img src="{{ asset('img/admin/icon-finances-2.png') }}" \></a>
            <a href="" class="button"><img src="{{ asset('img/admin/icon-notifications.png') }}" \></a>
            <a href="" class="button"><img src="{{ asset('img/admin/icon-reminders.png') }}" \></a>
        </div>
    </div>
</div>
<!-- END NAVBAR -->