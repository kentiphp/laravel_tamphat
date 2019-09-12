<?php


namespace App\Services;


class MyHelper {
    static function getAppName() {
        return env('APP_NAME') ?? 'Tâm Phát';
    }

    static  function moneyFormating($money) {
        return number_format($money,0,".",",") . " VNĐ";
    }
}