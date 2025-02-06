$(document).ready(function(){

    /*
    * Decorate the client's name
    */
    $(".client_name").hover(function() {
        $(this).css("text-decoration", "underline");
    },
    function() {
        $(this).css("text-decoration", "none");
    });

    /*
    * Show the cars of the specified client who was clicked on
    */
    let showed = false;
    $(".client_name").click(function(){
        let table = $(this).parent().next().find('table');
        console.log(showed);
        if (showed) {
            showed = false;
            table.html('');
        }else{
            showed = true;
            let client_id = $(this).siblings('.client_id').html();
            
            //let table = $(this).parent().next().find('table');

            $.ajax({
                type: "GET",
                url: "/get-cars-of-client",
                data: { 'client_id' : client_id },
                dataType: "json",
                success: function(response){
                    $.each(response.cars, function(key, item){
                        table.append('<tr>\
                                    <td>' + item.car_id + '</td>\
                                    <td>' + item.type + '</td>\
                                    <td>' + item.registered + '</td>\
                                    <td>' + item.ownbrand + '</td>\
                                    <td>' + item.accident + '</td>\
                                </tr>');
                    });
                }
            });
            
        }
    });

});
