<?php

class CalculateRemainDays
{
    public static function remainDays($dueDate): int
    {
        $future = strtotime($dueDate);
        $now = time();
        $timeLeft = $future - $now;
        return ceil((($timeLeft/24)/60)/60);
    }

    public static function daysLeftToString($daysLeft): string
    {
        if ($daysLeft < 0){
            return "<strong class='text-danger'>Overdue</strong>";
        }else if ($daysLeft == 0){
            return "<strong class='text-danger'>0</strong>";
        }else{
            if ($daysLeft < 30){
                return "<strong class='text-danger'>" . $daysLeft . "</strong> days";
            }else {
                return "<strong class='text-dark'>" . $daysLeft . "</strong> days";
            }
        }
    }

    public static function targetPerDay(int $daysLeft, int $currentProgress): float|int
    {

        $remainPercents = 100 - $currentProgress;

        if ($daysLeft > 1){

            $remainPercents = round($remainPercents / intval($daysLeft),1);

        }
        return $remainPercents;

    }
}