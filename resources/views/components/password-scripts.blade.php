<script>
    $('.input-group-addon').each(function () {
        $(this).on('click', function () {
            let classname = $(this).children('i').prop('class') == 'ion-eye-disabled' ? 'ion-eye' : 'ion-eye-disabled';
            $(this).children('i').prop('class', classname);

            let type = $(this).parent().children('input').prop('type') == 'password' ? 'text' : 'password';
            $(this).parent().children('input').prop('type', type);
        })
    });

    $('[name=password]').on('keyup', function(e) {
        let password = $(this).val(),
            regex = /^(?=.*\d)(?=.*[a-zA-Z]).{8,}$/;
        if (regex.test(password)) {
            $('#password-indicator')
                .text('@lang("locale.password_strong")')
                    .addClass('text-mint')
                        .removeClass('text-danger');
        } else {
            $('#password-indicator')
                .text('@lang("locale.password_rules")')
                    .addClass('text-danger')
                        .removeClass('text-mint');
        }
    })  

    // $('#locale-btn').on('click', function(e) {
    //     e.preventDefault();
    //     axios.get($(this).prop('href'))
    //         .then(setTimeout(window.location.reload(), 1000))
    //             .catch((e) => console.log(e.response.data.message));
    // })
</script>