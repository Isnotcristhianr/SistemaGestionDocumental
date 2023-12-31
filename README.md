# SISTEMA DE GESTION DOCUMENTAL PUCESI

<img src="https://github.com/Isnotcristhianr/SistemaGestionDocumental_Pucesi/blob/main/public/imgs/readme/vista2.jpeg?raw=true">

Sistema de gestion docuemntal es, un sistema de información que permite la administración de los documentos de la PUCE-I como normativas, syllabus, otras; además, facilitando el acceso a la información de manera rápida y eficiente de reportes de estudiantes en torno a:
* Grado, Posgrado, Tecnologias
* Permite generar reportes:
** escuelas
** carreras
** periodo
** fecha
** general

<img src="https://github.com/Isnotcristhianr/SistemaGestionDocumental_Pucesi/blob/main/public/imgs/readme/vista1.jpeg?raw=true">

# Logica Estadistica Matriz

TIPO -> tbl_carrera_tipo [posgrado(1), grado(2), tecnología(3)] <br>
CONDICION -> tbl_estudiante [matriculados (1), egresado(2), graduado(3)] <br>
TIPO_GRADO -> tbl_modalidad_titulacion <br>
PERIODO -> tbl_periodo [usar la tbl, PER_PERIODO] <br>
CARRERA -> tbl_carrera [usar la tbl, CAR_NOMBRE] <br>
CAMPUS -> [Ibarra(1), Tulcán(2)] <br>

bdd: gestion_documental

Soporte Técnico: https://isnotcristhianr.me/


## CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
