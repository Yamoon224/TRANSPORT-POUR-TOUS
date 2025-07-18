$('form').on('submit', function(e) {
    e.preventDefault();
    
    if($('#submit-btn') != undefined)
        $('#submit-btn').text('En cours...');
        
    $(":submit", this).on("click", false);
    axios.post($(this).attr('action'),  new FormData(this))
        .then(response => {
            response = response.data;
            console.log(e);
            if (response?.payment_url != undefined) 
                window.location.href = response.payment_url;
                
            if (response?.message) 
               $('#message-report').html(response.message);
            
            if(response?.payment_url == undefined)
                setTimeout(window.location.reload(), 5000);
        })
        .catch(e => {
            console.log(e);
            $('#report-error').text(e.response.data.message);
            // setTimeout(window.location.reload(), 180000);
        });
})