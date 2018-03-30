<?php

declare(strict_types=1);

use LionNet\MozParanoid\Config\RulesFromFileConfig;
use LionNet\MozParanoid\Domain\PreferenceRulesAnalyzer;
use LionNet\MozParanoid\Infrastructure\PreferenceRulesBuilder;
use LionNet\MozPrefs\Discoverer\Config\BasePathConfig;
use LionNet\MozPrefs\Discoverer\Config\Exceptions\ConfigurationException;
use LionNet\MozPrefs\Discoverer\UserPreferencesDiscoverer;
use LionNet\MozPrefs\Parser\UserPreferencesParser;

require_once './vendor/autoload.php';

$configFilePath = 'resources/config.yml';

try {
    $preferenceRulesBuilder = new PreferenceRulesBuilder(new RulesFromFileConfig($configFilePath));
    $userPreferencesDiscoverer = new UserPreferencesDiscoverer(new BasePathConfig($configFilePath));
    $preferenceRules = $preferenceRulesBuilder->build();
} catch (ConfigurationException $exception) {
    die('Configuration step exception: ' . $exception->getMessage() . PHP_EOL);
}

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
