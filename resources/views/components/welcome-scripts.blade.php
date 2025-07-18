<script src="{{ asset(ispublicpath() .'plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/bootstrap-validator/bootstrapValidator.min.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset(ispublicpath() .'plugins/select2/js/select2.min.js') }}"></script>
<!-- <script src="{{ asset(ispublicpath() .'js/auth.js') }}"></script> -->
<script>           
    var isEmptyField = (fields) => {
        isEmpty = 0;
        fields.each(function() {
            if ($(this).val().trim() === '') {
                isEmpty++; 
            }
        });

        return isEmpty == 0 ? false : true;
    }
    
    $(document).on('nifty.ready', 
        $('#demo-cir-wz')
            .bootstrapWizard({
                tabClass:'wz-steps',
                nextSelector:'.next',
                previousSelector:'.previous',
                onTabClick:function(tab, navigation, index) {
                    return false;
                },
                onInit:function() {
                    $('#demo-cir-wz').find('.finish').hide().prop('disabled', true);
                    $('#demo-cir-wz').find('.next').prop('disabled', true);
                },
                onTabShow:function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = (index / $total) * 100;
                    var margin = (100 / $total) / 2;                    
                    $('#demo-cir-wz').find('.progress-bar').css({width:$percent+'%', 'margin':0+'px '+margin+'%'});
                    navigation.find('li:eq('+index+') a').trigger('focus');

                    // First Step 
                    if ($current == 1) {
                        $('#accept-conditions').on('click', function() {
                            if ($(this).is(':checked')) {
                                $('#demo-cir-wz').find('.next').prop('disabled', false);
                            } else {
                                $('#demo-cir-wz').find('.next').prop('disabled', true);
                            }
                        })
                    }
                    
                    // Second Step 
                    if ($current == 2) {
                        $('#demo-cir-wz').find('.next').show();
                        $('#demo-cir-wz').find('.next').prop('disabled', isEmptyField($('#demo-cir-tab2').find('input')));

                        // Chech If Field is Empty
                        $('#demo-cir-tab2').find('input').each(function() {
                            $(this).on('keyup', function() {
                                $('#demo-cir-wz').find('.next').prop('disabled', isEmptyField($('#demo-cir-tab2').find('input')))
                            })
                        });

                        $('select[name="country_id"]').on('change', function (e) {
                            let price = parseInt($(this).children('option:selected').attr('title')),
                                currency = $(this).children('option:selected').attr('itemid');
                            $('#amount').text( price + ' ' + currency );
                        });

                        
                    }

                    // Second Step 
                    if ($current == 3) {
                        $('#demo-cir-wz').find('.next').show();

                        $('#demo-cir-wz').find('.next').prop('disabled', isEmptyField($('#demo-cir-tab3').find('input')));

                        // Chech If Field is Empty

                        $('#demo-cir-tab3').find('input').each(function() {
                            $(this).on('keyup', function () {
                                $('#demo-cir-wz').find('.next').prop('disabled', isEmptyField($('#demo-cir-tab3').find('input')));
                            })
                        });
                    }

                    // Last Step 
                    if($current >= $total) {
                        $('#demo-cir-wz').find('.finish').show().prop('disabled', false);
                        $('#demo-cir-wz').find('.next').hide();                        
                    } else {
                        $('#demo-cir-wz').find('.finish').hide().prop('disabled', true);
                    }
                }
            })
    );
</script>