/**
$('.accordion-toggle').click(function (event) {
    var $this = $(this);

    // It will reset all the other icons except the clicked item icon

    $('.accordion-toggle').not(this).children('i').removeClass('fa-close').addClass('fa-chevron-down');

    if ($this.children('i').hasClass('fa-chevron-down')) {

        $this.children('i').removeClass('fa-chevron-down').addClass('fa-close');

    } else {

        $this.children('i').removeClass('fa-close').addClass('fa-chevron-down');

    }
})

**/