<?php
function dd($data, bool $ShowType = false): void
{
    echo "<pre style='color: antiquewhite;background-color: #2c2a2a;font-size: 18px ;line-height: 1.4rem;padding: 20px;margin: 10px; border-radius: 30px;'>";
    if ($ShowType) {
        var_dump($data);
    } else {
        print_r($data);
    }
    echo "</pre>";
    die();
}

function url(string $path = null): string
{
    $url = isset($_SERVER["HTTPS"]) ? "https" : "http";
    $url .= "://";
    $url .= $_SERVER["HTTP_HOST"];
    if (isset($path)) {
        $url .= "/";
        $url .= $path;
    }
    return $url;
}

function alert(string $message, string $color = "info"): string
{
    return "<div class='alert alert-$color'>$message</div>";
}

function DateTime(string $timestamp, string $format = "j M Y"): string
{
    return date($format, strtotime($timestamp));
}
