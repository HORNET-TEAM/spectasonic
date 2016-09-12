Spectasonic
=================

## Introduction

The project is a simple Symfony 3.1 project for Spectasonic project.

## Environment

* php 5.6
* apache 2.4
* mysql 5.5
* phpmyadmin (optional)

## Getting started

1. Just clone it just do a

   ```
   git clone https://github.com/HORNET-TEAM/spectasonic
   ```

2. You need to install Composer, dependancies manager of php package. Go here to install it by fallowing the instuctions here 
: [Documentation install](https://getcomposer.org/download/)

3. Make a `composer install` at the project root to install all the project with dependencies;

4. Update the database in order to create the database mapping with this command at the project root:

```
    bin/console doctrine:schema:update --force
```


## Documentation

* [Administration](docs/sonata-admin.md)
* [User](docs/fos-user.md)
* [Git workflow](docs/git.md)
* [Add element](docs/add-element.md)
* [System configuration for others features](docs/sys-conf.md)