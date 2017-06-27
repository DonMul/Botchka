# Botchka IRC Bot
## What is Botchka
Botchka is a IRC bot driven by a PHP engine. It has support for plugins/commands

## How do i start the bot
<pre>
$settings = new \Botchka\Settings(
    $serverName,
    $serverPort,
    $nickName,
    $password /* Optional */
    $registeredPlugins /* Optional */
    $pluginSettings /* Optional */
);

$bot = new \Botchka\Bot($settings);
$bot->start();
</pre>

## Which plugins are in the default package
### AutoJoin
This plugin is used for autojoining channels after logging in. In order to use this plugin, add the following class to
the registered plugins array in the settings:
<pre>
\Botchka\Plugin\AutoJoin\Plugin
</pre>

### Help
This plugin is used for getting help messages for plugins and a general help message. In order to use this plugin, add the following class to
the registered plugins array in the settings:
<pre>
\Botchka\Plugin\Help\Plugin
</pre>

### Logger
This plugin is used logging all incoming and outgoing messages to stdOut. In order to use this plugin, add the following class to
the registered plugins array in the settings:
<pre>
\Botchka\Plugin\Help\Plugin
</pre>