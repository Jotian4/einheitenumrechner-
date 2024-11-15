<?php

// Längenumrechnungen
function convertMetersToCentimeters($meters)
{
    return $meters * 100;
}

function convertKilometersToMiles($kilometers)
{
    return $kilometers * 0.621371;
}

// Zeitumrechnungen
function convertHoursToMinutes($hours)
{
    return $hours * 60;
}

function convertMinutesToSeconds($minutes)
{
    return $minutes * 60;
}

// Gewichtsumrechnungen
function convertKilogramsToTons($kilograms)
{
    return $kilograms / 1000;
}

// Funktion zur Überprüfung der Eingabe
function validateInput($input)
{
    return preg_match('/^-?\d+(\.\d+)?$/', $input);
}

// Funktion zur Speicherung der Umrechnungen in der Datei "umrechnungen.txt"
function saveToFile($conversion)
{
    $file = fopen("umrechnungen.txt", "a");
    if ($file === false) {
        echo "Fehler: Datei konnte nicht geöffnet werden.\n";
        return;
    }
    fwrite($file, $conversion . PHP_EOL);
    fclose($file);
}

// Hauptprogramm
echo "Willkommen beim erweiterten Einheitenumrechner!\n";

while (true) {
    echo "\nWelche Umrechnung möchten Sie durchführen?\n";
    echo "1. Celsius in Fahrenheit\n";
    echo "2. Kilometer in Meilen\n";
    echo "3. Kilogramm in Tonnen\n";
    echo "4. Meter in Zentimeter\n";
    echo "5. Stunden in Minuten\n";
    echo "6. Minuten in Sekunden\n";
    echo "7. Beenden\n";
    echo "Bitte wählen Sie eine Option (1-7): ";
    $choice = trim(fgets(STDIN));

    if ($choice === "1") {
        echo "Geben Sie die Temperatur in Celsius ein: ";
        $temp = trim(fgets(STDIN));
        if (validateInput($temp)) {
            $result = ($temp * 9 / 5) + 32;
            $output = "$temp °C sind " . round($result, 2) . " °F";
            echo $output . "\n";
            saveToFile($output);
        } else {
            echo "Ungültige Eingabe. Bitte geben Sie eine Zahl ein.\n";
        }
    } elseif ($choice === "2") {
        echo "Geben Sie die Distanz in Kilometern ein: ";
        $kilometers = trim(fgets(STDIN));
        if (validateInput($kilometers)) {
            $result = convertKilometersToMiles((float)$kilometers);
            $output = "$kilometers Kilometer sind " . round($result, 2) . " Meilen";
            echo $output . "\n";
            saveToFile($output);
        } else {
            echo "Ungültige Eingabe. Bitte geben Sie eine Zahl ein.\n";
        }
    } elseif ($choice === "3") {
        echo "Geben Sie das Gewicht in Kilogramm ein: ";
        $kilograms = trim(fgets(STDIN));
        if (validateInput($kilograms)) {
            $result = convertKilogramsToTons((float)$kilograms);
            $output = "$kilograms Kilogramm sind " . round($result, 2) . " Tonnen";
            echo $output . "\n";
            saveToFile($output);
        } else {
            echo "Ungültige Eingabe. Bitte geben Sie eine Zahl ein.\n";
        }
    } elseif ($choice === "4") {
        echo "Geben Sie die Länge in Metern ein: ";
        $meters = trim(fgets(STDIN));
        if (validateInput($meters)) {
            $result = convertMetersToCentimeters((float)$meters);
            $output = "$meters Meter sind $result Zentimeter";
            echo $output . "\n";
            saveToFile($output);
        } else {
            echo "Ungültige Eingabe. Bitte geben Sie eine Zahl ein.\n";
        }
    } elseif ($choice === "5") {
        echo "Geben Sie die Zeit in Stunden ein: ";
        $hours = trim(fgets(STDIN));
        if (validateInput($hours)) {
            $result = convertHoursToMinutes((float)$hours);
            $output = "$hours Stunden sind $result Minuten";
            echo $output . "\n";
            saveToFile($output);
        } else {
            echo "Ungültige Eingabe. Bitte geben Sie eine Zahl ein.\n";
        }
    } elseif ($choice === "6") {
        echo "Geben Sie die Zeit in Minuten ein: ";
        $minutes = trim(fgets(STDIN));
        if (validateInput($minutes)) {
            $result = convertMinutesToSeconds((float)$minutes);
            $output = "$minutes Minuten sind $result Sekunden";
            echo $output . "\n";
            saveToFile($output);
        } else {
            echo "Ungültige Eingabe. Bitte geben Sie eine Zahl ein.\n";
        }
    } elseif ($choice === "7") {
        echo "Vielen Dank fürs Benutzen des Einheitenumrechners von Joris. Auf Wiedersehen!\n";
        break;
    } else {
        echo "Ungültige Auswahl. Bitte wählen Sie eine Option von 1 bis 7.\n";
    }
}
