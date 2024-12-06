# Deliberation for Town Hall Bundle

![GitHub release (with filter)](https://img.shields.io/github/v/release/Pixel-Mairie/sulu-townhallbundle) [![Dependency](https://img.shields.io/badge/sulu-2.5-cca000.svg)](https://sulu.io/) [![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=Pixel-Mairie_sulu-townhallbundle&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=Pixel-Mairie_sulu-townhallbundle)

## Presentation
A Sulu bundle to manage deliberations.

## Features

* Deliberation management
* List of entities (via smart content)
* Activity log
* Trash

## Requirement
* PHP >= 8.1
* Sulu >= 2.6
* Symfony >= 5.4
* Composer

## Installation
### Install the bundle

Execute the following [composer](https://getcomposer.org/) command to add the bundle to the dependencies of your
project:

```bash
composer require pixelmairie/sulu-townhalldeliberationbundle
```

### Enable the bundle

Enable the bundle by adding it to the list of registered bundles in the `config/bundles.php` file of your project:

 ```php
 return [
     /* ... */
     Pixel\TownHallDeliberationBundle\TownHallDeliberationBundle::class => ['all' => true],
 ];
 ```

### Update schema
```shell script
bin/console do:sch:up --force
```

## Bundle Config

Define the Admin Api Route in `routes_admin.yaml`
```yaml
townhall.deiberations_api:
  type: rest
  prefix: /admin/api
  resource: pixel_townhall.deliberations_route_controller
  name_prefix: townhall.
``` 

## Use
### Add/Edit
Go to the "Town hall" section in the administration interface. Then, click on "Deliberation".
To add, simply click on "Add". Fill the fields that are needed for your use.

Here is the list of the fields:
* Title (mandatory)
* Date (mandatory)
* PDF file (mandatory)
* Description

Once you finished, click on "Save".

The deliberation you added is not visible on the website yet. In order to do that, click on "Activate?". It should be now visible for visitors.

To edit, simply click on the pencil at the left of the entity you wish to edit.

### Remove/Restore

There are two ways to remove a deliberation:
* Check every deliberation you want to remove and then click on "Delete"
* Go to the detail of a deliberation (see the "Add/Edit" section) and click on "Delete".

In both cases, the deliberation will be put in the trash.

To access the trash, go to the "Settings" and click on "Trash".
To restore a deliberation, click on the clock at the left. Confirm the restore. You will be redirected to the detail of the deliberation you restored.

To remove permanently a deliberation, check all the deliberations you want to remove and click on "Delete".

## Contributing

You can contribute to this bundle. The only thing you must do is respect the coding standard we implement.
You can find them in the `ecs.php` file.
