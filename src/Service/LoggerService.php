<?php

class LoggerService
{
    private static $dir = __DIR__ . '/../../counter.txt';

    public static function incrementNumberOfVisitors()
    {
        $counter = self::getNumberOfVisitors();
        // increment
        $counter++;

        file_put_contents(self::$dir, $counter);
    }

    public static function getNumberOfVisitors()
    {
        $counter = @file_get_contents(self::$dir);

        return !$counter ? 0 : intval($counter);

    }
}
