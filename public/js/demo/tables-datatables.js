$(document).on('nifty.ready',function(){$.fn.DataTable.ext.pager.numbers_length=5;
    $('#demo-dt-basic').dataTable({
        "responsive":true,
        "language":{
            "paginate":{
                "previous":'<i class="demo-psi-arrow-left"></i>',"next":'<i class="demo-psi-arrow-right"></i>'
            }
        }
    });
    var rowSelection=$('#demo-dt-selection').DataTable({"responsive":true,"language":{"paginate":{"previous":'<i class="demo-psi-arrow-left"></i>',"next":'<i class="demo-psi-arrow-right"></i>'}}});$('#demo-dt-selection').on('click','tr',function(){if($(this).hasClass('selected')){$(this).removeClass('selected');}
else{rowSelection.$('tr.selected').removeClass('selected');$(this).addClass('selected');}});var rowDeletion=$('#demo-dt-delete').DataTable({"responsive":true,"language":{"paginate":{"previous":'<i class="demo-psi-arrow-left"></i>',"next":'<i class="demo-psi-arrow-right"></i>'}},"dom":'<"toolbar">frtip'});$('#demo-custom-toolbar').appendTo($("div.toolbar"));$('#demo-dt-delete tbody').on('click','tr',function(){$(this).toggleClass('selected');});$('#demo-dt-delete-btn').click(function(){rowDeletion.rows('.selected').remove().draw(false);});var t=$('#demo-dt-addrow').DataTable({"responsive":true,"language":{"paginate":{"previous":'<i class="demo-psi-arrow-left"></i>',"next":'<i class="demo-psi-arrow-right"></i>'}},"dom":'<"newtoolbar">frtip'});$('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));var randomInt=function(min,max){return Math.floor(Math.random()*(max-min+1)+min);}
$('#demo-dt-addrow-btn').on('click',function(){t.row.add(['Adam Doe','New Row','New Row',randomInt(1,100),'2015/10/15','$'+randomInt(1,100)+',000']).draw();});});