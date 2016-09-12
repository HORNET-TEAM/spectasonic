## Configuration système

#### Contact

1. Installation of a MTA like sendmail, postfix is required to use contact form;
2. Indicate in your parameters just the mail and config you want such like

```
    mailer_transport:  smtp
    mailer_host:       127.0.0.1
    mailer_user:       ~
    mailer_password:   ~
```

An example:

```
    mailer_transport: smtp
    mailer_host: smtp.gmail.com
    mailer_user: mail@gmail.com
    mailer_password: your_pass
```