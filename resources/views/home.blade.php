<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Autószervíz naplókezelés</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

        <div class="search_area">
            <div class="search_form">
                <h1>Keresés</h1>
                <form method="get" class="client_idcard_form">
                    Ügyfél neve: <input type="text" name="clients_name" id="clients_name">
                    Ügyfél okmányazonosítója: <input type="text" name="clients_idcard" id="clients_idcard" pattern="[A-Za-z0-9]+">
                    <button>Keresés</button>
                </form>
                <div class="warning"></div>
            </div>
            <div class="search_result">
                
            </div>
        </div>

        <div class="clients">
            <h2>Az ügyfelek adatainak listája</h2>

            <table>
                <tr>
                    <th>Ügyfél azonosító</th>
                    <th>Név</th>
                    <th>Okmányazonosító</th>
                </tr>
                @foreach($clients as $index => $client)
                <tr>
                    <td class="client_id"><?= $client->id ?></td>
                    <td class="client_name" data-clicked="false"><?= $client->name ?></td>
                    <td><?= $client->idcard ?></td>
                </tr>
                <tr>
                    <td colspan="3"><table></table></td>
                </tr>
                @endforeach
            </table>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
