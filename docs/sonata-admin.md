Sonata Admin
=================

## Introduction

It allow us to admin all our entities through a cool interface call AdminLTE.

## Installation

Just a dependance in the composer.json file just type `composer update`

## Configuration

This bundle is already configure for the project, we just have to use this commands to install front dependancies for sonata admin
in your application folder

```
 apt-get install -y npm
 npm install -g bower
 ln -s /usr/bin/nodejs /usr/bin/node
 bower install ./vendor/sonata-project/admin-bundle/bower.json
 bin/console assets:install
 bin/console cache:clear
```