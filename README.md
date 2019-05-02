<p align="center">
    <a href="https://github.com/manxoloh/mercskyafricatarget="_blank">
        <img src="http://mercskyafrica.co.ke/theme/img/mercskyafrica.jpg" height="100px">
    </a>
    <h1 align="center">Merc Sky Africa School Management System.</h1>
    <br>
</p>

Merc Sky Africa provides a complete school management system that has all essentials needed for running a school. (http://mercskyafrica.co.ke/. The software is designed to suit all education institutions below the tertiary level and provides Comprehensive and Enriched school management functions in real-time..

Merc Sky Africa SMS has been specially designed considering the challenges schools come across.

Some of these challenges are low cost of ownership, mediocre IT infrastructure, skill set level requirements, resource optimization, parent-student-teacher community interaction, security, and stability.

Emphasis has been given on easy-to-use interfaces.The menu-driven screens have detailed explanations and offer several options. The users need not be IT savvy to benefit from this system.

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
