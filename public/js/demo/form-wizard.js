$(document).on('nifty.ready',function(){
    $('#demo-main-wz').bootstrapWizard({
        tabClass:'wz-steps',
        nextSelector:'.next',previousSelector:'.previous',
        onTabClick:function(tab,navigation,index){return false;},
        onInit:function(){
            $('#demo-main-wz').find('.finish').hide().prop('disabled',true);
        },
        onTabShow:function(tab,navigation,index){
            var $total=navigation.find('li').length;
            var $current=index+1;
            var $percent=($current/$total)*100;var wdt=100/$total;
            var lft=wdt*index;
            $('#demo-main-wz').find('.progress-bar').css({
                width:wdt+'%',
                left:lft+"%",
                'position':'relative',
                'transition':'all .5s'
            });
            if($current>=$total){
                $('#demo-main-wz').find('.next').hide();
                $('#demo-main-wz').find('.finish').show();
                $('#demo-main-wz').find('.finish').prop('disabled',false);
            }else{
                $('#demo-main-wz').find('.next').show();
                $('#demo-main-wz').find('.finish').hide().prop('disabled',true);
            }
        }
    });

    $('#demo-cls-wz').bootstrapWizard({
        tabClass:'wz-classic',
        nextSelector:'.next',
        previousSelector:'.previous',
        onTabClick:function(tab,navigation,index){return false;},
        onInit:function(){
            $('#demo-cls-wz').find('.finish').hide().prop('disabled',true);
        },
        onTabShow:function(tab,navigation,index){
            var $total=navigation.find('li').length;
            var $current=index+1;var $percent=($current/$total)*100;
            var wdt=100/$total;var lft=wdt*index;
            $('#demo-cls-wz').find('.progress-bar').css({width:$percent+'%'});
            if($current>=$total){
                $('#demo-cls-wz').find('.next').hide();
                $('#demo-cls-wz').find('.finish').show();
                $('#demo-cls-wz').find('.finish').prop('disabled',false);
            }
            else{
                $('#demo-cls-wz').find('.next').show();
                $('#demo-cls-wz').find('.finish').hide().prop('disabled',true);
            }
        }
    });

    $('#demo-step-wz').bootstrapWizard({
        tabClass:'wz-steps',
        nextSelector:'.next',
        previousSelector:'.previous',
        onTabClick:function(tab,navigation,index){return false;},
        onInit:function(){
            $('#demo-step-wz').find('.finish').hide().prop('disabled',true);
        },
        onTabShow:function(tab,navigation,index){
            var $total=navigation.find('li').length;
            var $current=index+1;
            var $percent=(index/$total)*100;
            var wdt=100/$total;
            var lft=wdt*index;
            var margin=(100/$total)/2;
            $('#demo-step-wz').find('.progress-bar').css({width:$percent+'%','margin':0+'px '+margin+'%'});
            if($current>=$total){
                $('#demo-step-wz').find('.next').hide();$('#demo-step-wz').find('.finish').show();$('#demo-step-wz').find('.finish').prop('disabled',false);
            }else{
                $('#demo-step-wz').find('.next').show();
                $('#demo-step-wz').find('.finish').hide().prop('disabled',true);
            }
        }
    });

    $('#demo-cir-wz').bootstrapWizard({
        tabClass:'wz-steps',
        nextSelector:'.next',
        previousSelector:'.previous',
        onTabClick:function(tab,navigation,index){return false;},
        onInit:function(){$('#demo-cir-wz').find('.finish').hide().prop('disabled',true);},
        onTabShow:function(tab,navigation,index){
            var $total=navigation.find('li').length;
            var $current=index+1;
            var $percent=(index/$total)*100;
            var margin=(100/$total)/2;$('#demo-cir-wz').find('.progress-bar').css({width:$percent+'%','margin':0+'px '+margin+'%'});
            navigation.find('li:eq('+index+') a').trigger('focus');
            if($current>=$total){
                $('#demo-cir-wz').find('.next').hide();
                $('#demo-cir-wz').find('.finish').show();
                $('#demo-cir-wz').find('.finish').prop('disabled',false);
            }else{
                $('#demo-cir-wz').find('.next').show();
                $('#demo-cir-wz').find('.finish').hide().prop('disabled',true);
            }
        }
    });

    $('#demo-bv-wz').bootstrapWizard({
        tabClass:'wz-steps',
        nextSelector:'.next',
        previousSelector:'.previous',
        onTabClick:function(tab,navigation,index){return false;},
        onInit:function(){$('#demo-bv-wz').find('.finish').hide().prop('disabled',true);},
        onTabShow:function(tab,navigation,index){
            var $total=navigation.find('li').length;
            var $current=index+1;
            var $percent=($current/$total)*100;
            var wdt=100/$total;
            var lft=wdt*index;
            $('#demo-bv-wz').find('.progress-bar').css({
                width:wdt+'%',left:lft+"%",'position':'relative','transition':'all .5s'
            });
            if($current>=$total){
                $('#demo-bv-wz').find('.next').hide();
                $('#demo-bv-wz').find('.finish').show();
                $('#demo-bv-wz').find('.finish').prop('disabled',false);
            }else{
                $('#demo-bv-wz').find('.next').show();
                $('#demo-bv-wz').find('.finish').hide().prop('disabled',true);
            }
        },
        onNext:function() {
            isValid=null;
            $('#demo-bv-wz-form').bootstrapValidator('validate');
            if(isValid===false)
                return false;
        }
    });
    
    var isValid;
    $('#demo-bv-wz-form').bootstrapValidator({
        message:'This value is not valid',
        feedbackIcons:{
            valid:'fa fa-check-circle fa-lg text-success',
            invalid:'fa fa-times-circle fa-lg',
            validating:'fa fa-refresh'
        },
        fields:{
            username:{
                message:'The username is not valid',
                validators:{
                    notEmpty:{message:'The username is required.'}
                }
            },
            email:{
                validators:{
                    notEmpty:{message:'The email address is required and can\'t be empty'},
                    emailAddress:{message:'The input is not a valid email address'}
                }
            },
            firstName:{
                validators:{
                    notEmpty:{message:'The first name is required and cannot be empty'},
                    regexp:{regexp:/^[A-Z\s]+$/i,message:'The first name can only consist of alphabetical characters and spaces'}
                }
            },
            lastName:{
                validators:{
                    notEmpty:{message:'The last name is required and cannot be empty'},
                    regexp:{regexp:/^[A-Z\s]+$/i,message:'The last name can only consist of alphabetical characters and spaces'}
                }
            },
            phoneNumber:{
                validators:{
                    notEmpty:{message:'The phone number is required and cannot be empty'},
                    digits:{message:'The value can contain only digits'}
                }
            },
            address:{
                validators:{
                    notEmpty:{message:'The address is required'}
                }
            }
        }
    }).on('success.field.bv',function(e,data){
        var $parent=data.element.parents('.form-group');
        $parent.removeClass('has-success');
    }).on('error.form.bv',function(e){
        isValid=false;
    });
});