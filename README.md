# moz-paranoid

MOZ for paranoids.

This project goal is to look for enabled telemetry settings. At first it search for profile preference files in defined **basePath**. Then it compares those files content with defined **rules**.

Inspired by: [Jak skutecznie wyłączyć telemetrię w Firefoksie?][1]

## Installation

Run command:

```
composer create-project lionnet/moz-paranoid
```

## Usage

Copy **resources/config.yml.dist** file to **resources/config.yml** file.
Adjust **basePath** and **rules** definitions.

Run script:

```
php moz-paranoid.php
```

[1]: https://www.dobreprogramy.pl/Jak-skutecznie-wylaczyc-telemetrie-w-Firefoksie-Jedno-klikniecie-to-za-malo,News,85414.html
