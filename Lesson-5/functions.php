<?php
define('DATA_JSON_FILE', __DIR__ . '/data.json');
/**
 * Возвращает массив данных буджетов
 * @return array|mixed
 */
function getRecords() {
    if (!file_exists(DATA_JSON_FILE)) {
        return [];
    }
    $json = file_get_contents(DATA_JSON_FILE);
    $arrayData = @json_decode($json, true);
    if (!empty($arrayData)) {
        return $arrayData;
    }
    return [];
}
