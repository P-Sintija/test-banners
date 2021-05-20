let id = 0

function addClick(banner) {
    id = banner.id

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: '/clicks',
        data: {
            id
        },
    });
}