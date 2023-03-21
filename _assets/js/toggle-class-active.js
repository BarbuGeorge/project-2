jQuery(".nav-item").on('click', function(){
    $(this).toggleClass('active').siblings().removeClass('active');
 })
 console.log('merge');