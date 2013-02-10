Malmo Yii Application Skeleton
==============================

This skeleton provides an app directory structure for yii application with Malmo system.
It was born from years of developing different yii apps and looks simple but also powerful.

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

By default app has config priority depends of app type:
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

Backend app:
-------------
Default application has two type - frontend and backend. Frontend application can be accessed by app url.
Backend app has access by subdomain - admin (for example: admin.site.com).
This can be changed in local.php config by constant BACKEND_SUBDOMAIN.
