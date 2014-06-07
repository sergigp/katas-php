<?php

class QueryNormalizerFactory
{
    public static function newDefaultQueryNormalizer()
    {
        return self::newQueryNormalizer("ES");
    }

    public static function newQueryNormalizer($languageCode)
    {
        return $languageCode === "XX" ? self::newQueryNormalizerXX() : self::newQueryNormalizerES();
    }

    public static function newQueryNormalizerES()
    {
        $filter = new QueryNormalizer();
        $filter->addFilter(new BlacklistFilter(self::articlesBlacklist("ES")));
        $filter->addFilter(new Singularizer(self::pluralsSuffixes("ES")));
        $filter->addFilter(new AccentRemover());
        $filter->addFilter(new BlacklistFilter(self::prepositionsBlackList("ES")));

        return $filter;
    }

    public static function newQueryNormalizerXX()
    {
        $filter = new QueryNormalizer();
        $filter->addFilter(new BlacklistFilter(self::articlesBlacklist("XX")));
        $filter->addFilter(new Singularizer(self::pluralsSuffixes("XX")));
        $filter->addFilter(new DuplicateNRemover());

        return $filter;
    }

    private static function pluralsSuffixes($languageCode)
    {
        $blackList = [
            "ES" => ["S"],
            "XX" => ["X"],
        ];

        return $blackList[$languageCode];
    }

    private static function prepositionsBlackList($languageCode)
    {
        $blacklist = [
            "ES" => ["A", "ANTE", "BAJO", "CABE", "CON", "CONTRA", "DE", "DESDE", "EN", "ENTRE", "HACIA",
                "HASTA", "PARA", "POR", "SEGUN", "SIN", "SO", "SOBRE", "TRAS"],
            "XX" => [],
        ];

        return $blacklist[$languageCode];
    }

    private static function articlesBlacklist($languageCode)
    {
        $blacklist = [
            "ES" => ["EL", "LA", "LOS", "LAS"],
            "XX" => ["XX"],
        ];

        return $blacklist[$languageCode];
    }
}
 