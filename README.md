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

## Work

Git is a version control, five people on many and many source code file couldn't be injuries for them. :stuck_out_tongue_winking_eye:

To work on it, we have to do several things. Keep in mind it's not complicated, just some pratice could be necessary. All the step describe here summerise the workflow with git on a project:

:ballot_box_with_check: Be in HORNET-TEAM :+1:<br>
:ballot_box_with_check: Create a new branch with `git branch TeammateName/task-we-have-done`<br>
:ballot_box_with_check: Then go on it branch with `git checkout TeammateName/task-we-have-done`<br>
:ballot_box_with_check: Edit some file, make your own change, do what you want with it !<br>
:ballot_box_with_check: Then add your change:<br>

1. Show changes file with a `git status`;
2. Add this file with `git add path/to/file1 [path/to/file2]`.

:ballot_box_with_check: **Before**, commiting (send) your edit file

1. We have to go to master with `git checkout master`;
2. Get every change on it with `git pull origin master`;
3. Then go back to your branch with `git checkout TeammateName/task-we-have-done`;
4. Commit your change in order to allow the `rebase` next command;
5. Get all change on master branch which had done and merged before your changes with `git rebase master`

Note it's in order to show that you have last changes on your branch before commit with ;

5. Somtimes conflicts could arriving, it will be explain in another section. :four_leaf_clover:

:ballot_box_with_check: Then commit to validate on your branch this file `git commit -m "Evolution de la page principal"`<br>
:ballot_box_with_check: Then push your branch with `git push origin TeammateName/task-we-have-done`. <br>
:ballot_box_with_check: If it's all good, I merge into master your change and I deploy on production last changes.<br>

Remember that you can do what you want, it's your branch, just a copy of master.

## Other documentation

* [Administration](docs/sonata-admin.md)
* [User](docs/fos-user.md)
