<?php

declare(strict_types=1);


namespace MyMagicStory\App;


final class StringRepository
{
    /**
     * @param array $mmsArr
     * @return string
     * @throws NoIntersectionFound
     */
    public function findIntersection(array $mmsArr): string
    {
        $splitNumbersA = explode(",", $mmsArr[0]);
        $splitNumbersB = explode(",", $mmsArr[1]);

        $result = array_intersect($splitNumbersA, $splitNumbersB);

        if (empty($result))
            throw new NoIntersectionFound();

        return (implode(",", $result));
    }

    /**
     * @param array $mmsArr
     * @return string
     */
    public function findLessSubstring(array $mmsArr): string
    {
        $result = $mmsArr[0];

        for ($i=0; $i < strlen($mmsArr[0]); $i++) {
            $tmpString = substr($mmsArr[0], $i);

            for ($c=0; $c < strlen($mmsArr[1]); $c++)
                if (stripos($tmpString, $mmsArr[1][$c]) === false)
                    return $result;

            $result = $tmpString;
        }

        return $result;
    }

    /**
     * @param string $mms
     * @return string
     */
    public function reverseString(string $mms): string
    {
        return strrev($mms);
    }
}