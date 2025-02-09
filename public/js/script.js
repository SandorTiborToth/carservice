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
    $(document).on('click', '.client_name', function(){
        let table = $(this).parent().next().find('table');
        if ($(this).attr('data-clicked') == "true") {
            $(this).attr('data-clicked','false');
            table.html('');
        }else{
            $(this).attr('data-clicked','true');
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
                                <th>Utolsó szervízbejegyzés</th>\
                                <th>Utolsó szervízbejegyzés dátuma</th>\
                            </tr>');
                    $.each(response.cars, function(key, item){
                        table.append('<tr>\
                                    <td class="car_serial" data-client-id="' + client_id + '">' + item.car_id + '</td>\
                                    <td>' + item.type + '</td>\
                                    <td>' + item.registered + '</td>\
                                    <td>' + item.ownbrand + '</td>\
                                    <td>' + item.accident + '</td>\
                                    <td>' + item.event + '</td>\
                                    <td>' + item.eventtime + '</td>\
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


    /*
    * Show the filtered search
    */
    $(document).on('submit', '.client_idcard_form', function(event){
        event.preventDefault();
        console.log("urlap");

        if ($('#clients_name').val() == "" && $('#clients_idcard').val() == "") {
            
            $('.warning').html('Valamelyik mező kitöltése kötelező!');
        
        }else if ($('#clients_name').val() != "" && $('#clients_idcard').val() != "") {
        
            $('.warning').html('Csak az egyik mezőt töltse ki!');
        
        }else{
            $('.warning').html('');
            if ($('#clients_name').val() != "") {
                submit_clients_name($('#clients_name').val());
            }else{
                submit_clients_idcard($('#clients_idcard').val());
            }
        }
    });



    function submit_clients_name(client_name_pattern) {
        $.ajax({
            type: "GET",
            url: "/filter-by-client-name",
            data: { 'client_name_pattern' : client_name_pattern },
            dataType: "json",
            success: function(response){
                $('.search_result').html('');
                $('.search_result').append('<table><tr>\
                            <th>Ügyfél azonosítója</th>\
                            <th>Ügyfél neve</th>\
                            <th>Ügyfél okmányazonosítója</th>\
                            <th>Autóinak darabszáma</th>\
                            <th>Összes naplóbejegyzés száma</th>\
                        </tr>\
                        <tr>\
                            <td>' + response.client.id + '</td>\
                            <td>' + response.client.name + '</td>\
                            <td>' + response.client.idcard + '</td>\
                            <td></td>\
                            <td></td>\
                        </tr>\
                        </table>');                
            }
        });
    }


    function submit_clients_idcard(client_idcard_pattern) {
        $.ajax({
            type: "GET",
            url: "/filter-by-client-idcard",
            data: { 'client_idcard_pattern' : client_idcard_pattern },
            dataType: "json",
            success: function(response){
                $('.search_result').html('');
                $('.search_result').append('<table><tr>\
                            <th>Ügyfél azonosítója</th>\
                            <th>Ügyfél neve</th>\
                            <th>Ügyfél okmányazonosítója</th>\
                            <th>Autóinak darabszáma</th>\
                            <th>Összes naplóbejegyzés száma</th>\
                        </tr>\
                        <tr>\
                            <td>' + response.client.id + '</td>\
                            <td>' + response.client.name + '</td>\
                            <td>' + response.client.idcard + '</td>\
                            <td></td>\
                            <td></td>\
                        </tr>\
                        </table>');                
            }
        });        
    }

});
