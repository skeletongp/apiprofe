<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

function formatNumber($number, $lenght = 2)
{
    $number = floatval(str_replace(',', '', $number));
    $formatted = rtrim(rtrim(number_format($number, 4, ".", ""), '0'), '.');
    if (!strpos('.', $formatted)) {
        $formatted = number_format($formatted, $lenght);
    }
    return $formatted;
}
function removeComma($number)
{
    $withoutComma = preg_replace("/[^0-9.-]/", "", $number);
    if (is_numeric($withoutComma)) {
        return $withoutComma;
    }
    return 0;
}


function avatar($name)
{
    $name = urlencode($name);
    return "https://ui-avatars.com/api/?name={$name}&background=d9d9d9&color=003366&bold=true&size=128";
}
function linkPhoto($link)
{

    if (str_starts_with($link, 'http')) {
        $photo = str_replace('http:', 'https:', $link);
        return asset($photo);
    }
    return $link;
}


/* @params Invoices $array, Related $key, Field $value */
/* Return Field´s Value from Related */
function arrayFind(array $array, $key, $value)
{
    $result = 0;
    foreach ($array as $ind => $item) {
        if ($array[$ind][$key] == $value) {
            $result = $item;
        }
    }
    return $result;
}
function admins()
{
    $store = auth()->user()->store;
    if (!Cache::get($store->id . 'admins')) {
        Cache::put($store->id . 'admins', $store->users()->role('Administrador')->where('loggeable', 'yes')
            ->orderBy('lastname')->pluck('password', 'fullname'));
    }

    return Cache::get($store->id . 'admins');
}
function formatDate($date, $format)
{
    return Carbon::parse($date)->format($format);
}
function getApi($endPoint)
{
    $url = null;
    if (strpos($endPoint, 'api')) {
        $url = $endPoint;
    } else {
        $url = env('BASE_URL') . $endPoint;;
    }
    $response = Http::withHeaders([
        'Accept' => 'application/json',

    ])->withToken(env('TOKEN'))
        ->get($url);
    return $response->json();
}
function ellipsis($string, $maxLength = 25)
{
    if (mb_strlen($string) > $maxLength) {
        return mb_substr($string, 0, $maxLength) . '...';
    }
    return $string;
}
function getNextDate(string $recurrency, $date)
{
    $fecha = Carbon::createFromDate($date);
    $recurrency = mb_strtolower($recurrency);
    switch ($recurrency) {
        case 'diario':
            $fecha->addDay();
            $fecha_db = $fecha->toDateString();
            break;
        case 'semanal':
            $fecha->addWeek();
            $fecha_db = $fecha->toDateString();
            break;
        case 'quincenal':
            $fecha->addDays(3);
            $day = $fecha->format('d');
            if ($day < 15) {
                $fecha = $fecha->day(15);
            } else {
                $fecha = $fecha->lastOfMonth();
            }
            $fecha_db = $fecha->toDateString();
            break;
        case 'mensual':
            $fecha->addMonth();
            $fecha_db = $fecha;
            break;
        case 'anual':
            $fecha->addYear();
            $fecha_db = $fecha;
            break;
    }
    return Carbon::parse($fecha_db);
}
function operate($a, $op, $b)
{
    $a = floatval(str_replace(',', '', $a));
    $b = floatval(str_replace(',', '', $b));
    switch ($op) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            return $a / $b;
        default:
            return null;
    }
}
function removeAccent($cadena)
{

    //Codificamos la cadena en formato utf8 en caso de que nos de errores
    //  $cadena = utf8_encode($cadena);

    //Ahora reemplazamos las letras
    $cadena = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $cadena
    );

    $cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $cadena
    );

    $cadena = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $cadena
    );

    $cadena = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $cadena
    );

    $cadena = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $cadena
    );



    return $cadena;
}

function getInitials($string)
{
    $words = explode(" ", $string);
    $acronym = "";
    foreach ($words as $w) {
        $acronym .= $w[0];
    }
    $acronym = preg_replace('/[^A-Za-z0-9\-]/', '', $acronym);
    return $acronym;
}

//time ago in spanish using Carbon

function ago($date, $full = null)
{
    $date = Carbon::parse($date);
    $now = Carbon::now();
    $diff = $date->diff($now);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array(
        'y' => 'año',
        'm' => 'mes',
        'w' => 'semana',
        'd' => 'día',
        'h' => 'hora',
        'i' => 'minuto',
        's' => 'segundo',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? 'hace ' . implode(', ', $string)  : 'ahora';
}

function uploadPhoto($photo, $dir = "photos", $intervention = false): string
{
  
    if (!$intervention) {
        $photo = $photo->getRealPath();
    } 
    $path = cloudinary()->upload(
        $photo,
        [
            'folder' => 'miprofe/' . $dir,
            'transformation' => [
                'width' => 480,
            ],
            ["responsive_breakpoints" => [
                "create_derived" => true, "bytes_step" => 20000, "min_width" => 200, "max_width" => 480,
                "transformation" => ["crop" => "fill", "aspect_ratio" => "9:16", "gravity" => "auto"]
            ]]
        ]
    )->getSecurePath();
    return $path;
}
