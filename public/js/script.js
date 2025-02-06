$(document).ready(function(){

    /*
    * Decorate the client's name and the car serial number
    */
    $(document).on('mouseenter', '.client_name, .car_serial', function(){
        $(this).css("text-decoration", "underline");
    });

    $(document).on('mouseleave', '.client_name, .car_serial', function(){
        $(this).css("text-decoration", "none");
    });

    /*
    * Show the cars of the specified client who was clicked on
    */
    let showed = false;
    $(document).on('click', '.client_name', function(){
        let table = $(this).parent().next().find('table');
        if (showed) {
            showed = false;
            table.html('');
        }else{
            showed = true;
            let client_id = $(this).siblings('.client_id').html();
            
            $.ajax({
                type: "GET",
                url: "/get-cars-of-client",
                data: { 'client_id' : client_id },
                dataType: "json",
                success: function(response){
                    table.append('<tr>\
                                <th>Autó sorszáma</th>\
                                <th>Autó típusa</th>\
                                <th>Regisztrálás időpontja</th>\
                                <th>Saját márkás-e</th>\
                                <th>Balesetek száma</th>\
                            </tr>');
                    $.each(response.cars, function(key, item){
                        table.append('<tr>\
                                    <td class="car_serial" data-client-id="' + client_id + '">' + item.car_id + '</td>\
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


    /*
    * Show the service log of the specified car
    */
    $(document).on('click', '.car_serial', function(){
        console.log("kattintva");
        let car_id = $(this).html();
        let client_id = $(this).attr('data-client-id');
        
        $(this).parent().after('<tr><td colspan="5"><table></table></td></tr>');

        let table = $(this).parent().next().find('table');

        $.ajax({
            type: "GET",
            url: "/get-services-of-car",
            data: { 'client_id' : client_id, 'car_id' : car_id },
            dataType: "json",
            success: function(response){
                table.append('<tr>\
                            <th>Alkalom sorszáma</th>\
                            <th>Esemény neve</th>\
                            <th>Esemény időpontja</th>\
                            <th>Munkalap azonosító</th>\
                        </tr>');
                $.each(response.services, function(key, item){
                    table.append('<tr>\
                                <td>' + item.lognumber + '</td>\
                                <td>' + item.event + '</td>\
                                <td>' + item.eventtime + '</td>\
                                <td>' + item.document_id + '</td>\
                            </tr>');
                });
            }
        });        
    });


});
