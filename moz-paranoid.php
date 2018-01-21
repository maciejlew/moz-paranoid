<?php

declare(strict_types=1);

use MozParanoid\Config\BasePathConfig;
use MozParanoid\Config\RulesConfig;
use MozParanoid\Domain\PreferenceRulesAnalyzer;
use MozParanoid\Exceptions\NoBasePathConfiguredException;
use MozParanoid\Exceptions\NoConfigFileException;
use MozParanoid\Exceptions\NoRulesConfiguredException;
use MozParanoid\Infrastructure\PreferenceRulesBuilder;
use MozParanoid\Infrastructure\UserPreferencesDiscoverer;
use MozParanoid\Infrastructure\UserPreferencesParser;

require_once './vendor/autoload.php';

try {
    $preferenceRulesBuilder = new PreferenceRulesBuilder(new RulesConfig());
    $userPreferencesDiscoverer = new UserPreferencesDiscoverer(new BasePathConfig());

} catch (NoConfigFileException|NoBasePathConfiguredException|NoRulesConfiguredException $exception) {
    die('Configuration step exception: ' . $exception->getMessage() . PHP_EOL);
}

$preferenceRules = $preferenceRulesBuilder->build();

$userPreferenceFiles = $userPreferencesDiscoverer->discover();

if (empty($userPreferenceFiles)) {
    die('Can not find any preferences file.');
}

$userPreferencesParser = new UserPreferencesParser();

foreach ($userPreferenceFiles as $userPreferenceFile) {

    echo 'Analyzing file ' . $userPreferenceFile->getPathname() . PHP_EOL;

    $userPreferences = $userPreferencesParser->parse(file_get_contents($userPreferenceFile->getPathname()));
    $preferenceRulesAnalyzer = new PreferenceRulesAnalyzer($userPreferences);

    foreach ($preferenceRules as $preferenceRule) {
        $result = $preferenceRulesAnalyzer->analyze($preferenceRule);
        if (!$result) {
            echo 'Detected ' . $preferenceRule->preferenceName . ' rule violation!' . PHP_EOL;
        }
    }
}




