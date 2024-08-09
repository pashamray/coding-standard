# Pasharmay code standard
This is sniffs collection for [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)

* `Pashamray.Functions.DisallowManyArguments`

## Install
```shell
composer req --dev pashamray/code-standard
```

## Usage
in console:
```shell
php vendor/bin/phpcs --standard=Pashamray src
```

or add rules to your `phpcs.xml` file

all rules set
```xml
<?xml version="1.0" encoding="utf-8"?>
<ruleset name="MyRulesSet">
    <description>The MyRulesSet coding standard.</description>
    ...
    <rule ref="Pashamray"/>
    ...
</ruleset>
```

or concrete rule with properties
```xml
<?xml version="1.0" encoding="utf-8"?>
<ruleset name="MyRulesSet">
    <description>The MyRulesSet coding standard.</description>
    ...
    <rule ref="Pashamray.Functions.DisallowManyArguments">
        <properties>
            <!-- default value=3 -->
            <property name="maxCountArguments" value="6"/>
        </properties>
    </rule>
    ...
</ruleset>
```

