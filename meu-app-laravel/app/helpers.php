<?php

function formatDateTime($dateTime)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('d/m/Y H:i');
}

function formatMoney($value)
{
    $cleanValue = str_replace('.', '', $value);

    return 'R$ ' . number_format($cleanValue, 2, ',', '.');
}