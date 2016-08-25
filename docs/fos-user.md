Fos User
=================

## Introduction

It allow us to add buisness entity user.

## Installation

Just a dependance in the composer.json file just type `composer update` at the main install.

## Configuration

This bundle is already configure for the project, we just have to use this commands to create a user and promote it to ROLE_ADMIN to access to pattern **^/admin**

```
# bin/console fos:user:create

Please choose a username:fucker
Please choose an email:qsd@qsd.com
Please choose a password:
Created user florian

# bin/console fos:user:promote florian

Please choose a role:ROLE_ADMIN
Role "ROLE_ADMIN" has been added to user "florian".
```

## About security

The file which allow us to admin the app is `app/config/security.yml` and the admin line is an ACL indicate here:

```
security:
	#...
	#...
	#...
    access_control:
    	# ..
      - { path: ^/admin/, role: ROLE_ADMIN }
```