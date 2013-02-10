Malmo Yii Application Skeleton
==============================

This skeleton provides an app directory structure for yii application with Malmo system.
It was born from years of developing different yii apps and looks simple but also powerful.

How to install:
--------------
1. Download and extract malmo-app repo.
2. Download and extract malmo repo in malmo-app directory.
3. Create new local webhost with webroot in public/ directory.
4. All done!

Skeleton Structure:
------------------

- app - application directory structure (in default yii skeleton named protected)
- bin - console application script and gearman workers
- etc - configuration directory, all local envirovment configs is in local subdir
- modules - modules directory
- public - web root directory
- public/themes - themes directory
- tmp - runtime directory, all temp files and logs


Application Configs:
-------------------

By default app has configs priority depends of app type:
- shared.php - main config, uses for all app types
- application type config:
	* web.php - used for web app
	* console.php - for console app
	* gearman.php - for gearman worker app
	* test.php - for phpunit tests
- for web application uses two configs depend of ot type:
	* frontend.php
	* backend.php
- local.php - local config for all application. This config is not under git (added to .gitignore)
- database.php - main database connection config. This config is not under git (added to .gitignore)

Notice: Url Manager added to shared config, not in web, because console or gearman workers sometimes need to generate
url address (for example emails).

Backend app:
-------------
Default application has two type - frontend and backend. Frontend application can be accessed by app url.
Backend app has access by subdomain - admin (for example: admin.site.com).
This can be changed in local.php config by constant BACKEND_SUBDOMAIN.

Views and themes:
----------------
By default, application doesn't has views directory. All views must be in themes. For frontend app default theme name is web,
for backend app - backend theme.

Helpers:
-------
For fast development skeleton has some helpful base classes and functions. App helpers is in app/components/helpers.
You can define your methods to this classes.
- C.php - cache shortcuts functions
- functions.php - some help functions
- Html.php - child of CHtml, project specific HTML helper
- Y.php - main shortcut classfor project. Use it methods for make your code more shorter.
