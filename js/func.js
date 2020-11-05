jQuery(function($) {
$('.ui.checkbox')
    .checkbox()
;});


var $base = $('#base'), 
    $orderList = $('#orderlist'),
    $btn=$('#buttons'),
    $zakaz=$('#zakaz'),
    zIndexLast = 1;
    

function recalcOrder()
{
    $orderList.html('');
    $btn.html('')
    var total = 60;

   
    $('.ingredient.checkbox:checked').each(function(i,e){
        var $ch = $(e),
            itemId = $ch.data('ingredient-id'),
            itemName = $ch.parent().find('p').text();
            total += itemId;

        $orderList.append($('<li data-ingredient-id="'+itemId+'"></li>').text( itemName+" "+'+'+ +itemId + 'грн'));
       

    });
            
            $btn.append($('<div class="total" data-total-price = "'+total+'"></div>').text('Ціна:'+" "+total+'грн'));
            if($zakaz.css('display') == 'none'){
                $zakaz.css('display','block')
            }
}

$('.ingredient.checkbox').each(function(i,e){
    let $ch = $(e),

        $layer = $('<div class="ingredient layer"></div>');
    $layer.css('background-image', "url('" + $ch.data('image') + "')"); 
    $base.append($layer);

    $ch.on('change', function(){
        if ($(this).is(':checked'))
        {   
            $(this).parent().css('background-color', '#f46534');
            $layer.css('z-index', 1); 
            $layer.css('opacity', 1); 
        } else
        {
            $(this).parent().css('background-color', 'unset');
            $layer.css('opacity', 0);
        }
        recalcOrder();
    });
});

// $zakaz.click(function (){
//     let ingrid = [];
//     $('#orderlist > li').each(function(){
//         str = $(this).text() 
//         ingrid.push(str.substring(0,str.length-6) )  


//     })
//     console.log(ingrid);
//     let $currentPrice = $('.total').data('total-price');
//     let data = JSON.stringify({ingredients:ingrid,totalPrise:$currentPrice});
//     console.log(data)

// });

