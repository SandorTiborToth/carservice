<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Autószervíz naplókezelés</title>

        <style type="text/css">
            .search_area{
                border: 2px solid deepskyblue;
            }

            .clients{
                border: 2px solid seagreen;
            }
        </style>
    </head>
    <body>
        <div class="search_area">
            <div class="search_form">
                <h1>Keresés</h1>
                <form>
                    Ügyfél neve: <input type="text" name="clients_name">
                    Ügyfél okmányazonosítója: <input type="text" name="clients_idcard">
                    <button>Keresés</button>
                </form>
            </div>
            <div class="search_result">
                <h2>Keresés eredménye</h2>
            </div>
        </div>

        <div class="clients">
            <h2>Az ügyfelek adatainak listája</h2>
            
        </div>
    </body>
</html>
