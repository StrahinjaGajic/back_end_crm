(function() {
    $('.sidebar .category').on('click', function() {
        var $self = $(this);

        $self.parent().toggleClass('open');
    });
})()