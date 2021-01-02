<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__) . '/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$kwota = $_REQUEST ['kwota'];
$lata = $_REQUEST ['lata'];
$procent = $_REQUEST ['procent'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if (!(isset($kwota) && isset($lata) && isset($procent))) {
    //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
    $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ($kwota == "") {
    $messages [] = 'Nie podano kwoty pożyczki';
}
if ($lata == "") {
    $messages [] = 'Nie podano lat spłacania pożyczki';
}
if ($procent == "") {
    $messages [] = 'Nie podano procentu kredytu';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty($messages)) {

    // sprawdzenie, czy $x i $y są liczbami całkowitymi
    if (!is_numeric($kwota)) {
        $messages [] = 'Kwota nie jest liczbą całkowitą';
    }

    if (!is_numeric($lata)) {
        $messages [] = 'Podany okres czasu nie jest liczbą całkowitą';
    }
    if (!is_numeric($procent)) {
        $messages [] = 'Podane oprocentowanie nie jest liczbą całkowitą';
    }

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ($messages)) { // gdy brak błędów

    //konwersja parametrów na float
    $kwota = floatval($kwota);
    $lata = floatval($lata);
    $procent = floatval($procent);

    //wykonanie operacji
    $rata = $kwota / ($lata * 12);
    $rata_z_procentem = $rata + ($rata * ($procent / 100));
}

// 4. Wywołanie widoku z przekazaniem zmiennych

include 'credit_calc_view.php';