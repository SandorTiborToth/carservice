<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Autószervíz naplókezelés</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

        <div class="search_area m-2 p-2">
            <div class="search_form">
                <form method="get" class="client_idcard_form mb-3">
                  <fieldset>
                    <legend><h2>Keresés</h2></legend>
                    <div class="mb-3">
                      <label for="clients_name" class="form-label">Ügyfél neve</label>
                      <input type="text" name="clients_name" id="clients_name" class="form-control" placeholder="Keresett ügyfél neve">
                    </div>
                    <div class="mb-3">
                      <label for="clients_idcard" class="form-label">Ügyfél okmányazonosítója</label>
                      <input type="text" name="clients_idcard" id="clients_idcard" pattern="[A-Za-z0-9]+" class="form-control" placeholder="Keresett okmányazonosító">
                    </div>

                    <button class="btn btn-primary">Keresés</button>
                  </fieldset>
                </form>

                <div class="warning mb-3"></div>        
            </div>
            <div class="search_result mb-3">
                        
            </div>
        </div>

        <div class="clients m-2 p-2">
            <h2>Az ügyfelek adatainak listája</h2>

            <table class="table table-hover">
                <tr>
                    <th scope="col">Ügyfél azonosító</th>
                    <th scope="col">Név</th>
                    <th scope="col">Okmányazonosító</th>
                </tr>
                @foreach($clients as $index => $client)
                <tr>
                    <td class="client_id"><?= $client->id ?></td>
                    <td class="client_name" data-clicked="false"><?= $client->name ?></td>
                    <td><?= $client->idcard ?></td>
                </tr>
                <tr class="cars_of_client">
                    <td colspan="3"><table class="table table-hover"></table></td>
                </tr>
                @endforeach
            </table>

        </div>

        <script src="{{ asset('js/script.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
