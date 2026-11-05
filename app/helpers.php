<?php

if (!function_exists('format_number_id')) {
    /**
     * Format number with Indonesian/German decimal separator
     */
    function format_number_id($number, $decimals = 0): string
    {
        if ($number === null || $number === '') {
            return '-';
        }
        return number_format((float)$number, $decimals, ',', '.');
    }
}

if (!function_exists('format_m3')) {
    /**
     * Format volume in cubic meters
     */
    function format_m3($number): string
    {
        if ($number === null || $number === '') {
            return '0 m³';
        }
        return format_number_id($number) . ' m³';
    }
}

if (!function_exists('format_rupiah')) {
    /**
     * Format currency in Rupiah
     */
    function format_rupiah($number): string
    {
        if ($number === null || $number === '') {
            return 'Rp 0';
        }
        return 'Rp ' . format_number_id($number);
    }
}

if (!function_exists('format_tanggal_id')) {
    /**
     * Format date in Indonesian format
     */
    function format_tanggal_id($date): string
    {
        if (!$date) {
            return '-';
        }
        try {
            return \Carbon\Carbon::parse($date)->locale('id')->isoFormat('D MMMM Y');
        } catch (\Throwable $e) {
            return (string)$date;
        }
    }
}

