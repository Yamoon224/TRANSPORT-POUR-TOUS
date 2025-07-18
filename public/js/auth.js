$('form').on('submit', function(e) {
    e.preventDefault();
    if($('#auth-btn') != undefined)
        $('#auth-btn').text('Connexion En cours...');
    
    $(":submit", this).on("click", false);
    axios.post($(this).attr('action'), new FormData(this))
        .then(response => {
            response = response.data;
            if (response?.payment_url) 
                window.location.href = response.payment_url;

            if(response.auth) {
                localStorage.setItem('solutionblink', response.redirect_url)
                window.location.href = response.redirect_url;
                window.location.reload()
            }            
        })
        .catch( e => {
            e = e.response.data;
            if (e.subscription === undefined)  {
                $('#report-error')
                    .text(e.message)
                        .addClass( e.class === undefined ? 'text-danger' : e.class );
            } 
            
            localStorage.setItem('solutionblink', $('meta[name="base_url"]').prop('content') + (e.auth !== undefined ? '/dashboard' : '/login'));  
            // setTimeout(location.reload(), 60000);
        });
})