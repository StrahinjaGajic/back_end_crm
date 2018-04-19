(function() {
    $('.sidebar .category').on('click', function() {
        var $self = $(this);
        $self.parent().toggleClass('open');
    });

    $('.nav-bar .hamburger').on('click', function() {
        var $self = $(this);
        var $body = $('body');
        var $sidebarState = $body.attr('sidebar');

        switch ($sidebarState) {
            case 'true':
                $body.attr('sidebar', 'false');
                break;

            case 'false':
                $body.attr('sidebar', 'true');
                break;
        }
    });
})()