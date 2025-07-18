var hostname = $('meta[name="base_url"]').prop('content');
var router = () => {
    // localStorage.setItem('navlink', hostname+'/home');
    // console.log(localStorage.getItem('solutionblink'));
    var navlink = localStorage.getItem('solutionblink') != undefined ? localStorage.getItem('solutionblink') : hostname+'/welcome';
    
    if (navlink != hostname+'/welcome' &&  $('meta[name="auth"]').prop('content') == '') 
        navlink = hostname+'/login';

    if (navlink != hostname+'/welcome') {
        if ($('meta[name="is-admin"]').prop('content') == true) {
            $('.navlink').removeClass('active-link');
            $('a[href="'+navlink+'"]').parent('li').addClass('active-link');  
        } else {
            $('.navlink').removeClass('active');
            $('.navlink').parent('li').removeClass('active');
            $('.navlink').children('svg').removeClass('active');
            $('.navlink').parent('li').children('.orange-boder').removeClass('active');

            $('a[href="'+navlink+'"]').addClass('active');
            $('a[href="'+navlink+'"]').parent('li').addClass('active');
            $('a[href="'+navlink+'"]').children('svg').addClass('active');
            $('a[href="'+navlink+'"]').parent('li').children('.orange-boder').addClass('active');
        }        
    }    
    $('#page-content').load(navlink, {'_token':$('meta[name="csrf-token"]').prop('content'), '_method':'GET'});
}

router();

$('.navlink').on('click', function (e) {
    e.preventDefault();
    let navlink = $('meta[name="is-admin"]').prop('content') == 'true' ? $(this).children('a').prop('href') : $(this).prop('href')
    localStorage.setItem('solutionblink', navlink);
    router();
});
