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
4. Get all change on master branch which had done and merged before your changes with `git rebase master`

Note it's in order to show that you have last changes on your branch before commit with ;

5. Somtimes conflicts could arriving, it will be explain in another section. :four_leaf_clover:

:ballot_box_with_check: Then commit to validate on your branch this file `git commit -m "Evolution de la page principal"`<br>
:ballot_box_with_check: Then push your branch with `git push origin TeammateName/task-we-have-done`. <br>
:ballot_box_with_check: If it's all good, I merge into master your change and I deploy on production last changes.<br>

Remember that you can do what you want, it's your branch, just a copy of master.

## Other documentation

* [SonataAdmin]('docs/sonata-admin.md')