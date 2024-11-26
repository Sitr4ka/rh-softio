<?php
/**
 * @param string $date
 * @return string $dayName
 */
function getDaysName(string $date)
{
    $timestamp = strtotime($date);
    $dayInEnglish =  date('l', $timestamp);
    return getFrenchDayName($dayInEnglish);
}

/**
 *  @param string $day
 *  @return string french value of the day
 */
function getFrenchDayName(string $day)
{
    $day = strtolower($day);

    $days = [
        'monday' => 'Lundi',
        'tuesday' => 'Mardi',
        'wednesday' => 'Mercredi',
        'thursday' => 'Jeudi',
        'friday' => 'Vendredi',
        'saturday' => 'Samedi',
        'sunday' => 'Dimanche'
    ];

    if (array_key_exists($day, $days)) {
        return $days[$day];
    }

    return null;

}
