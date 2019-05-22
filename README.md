# Statistics app

### Project setup:

- download or clone repository
- importDB from [sql file](https://github.com/adumitru68/statistics/blob/master/dumpDB/statistics.sql)
- create vhost
```
<VirtualHost *:80>
	ServerName jltest.loc
    DocumentRoot "path/to/public"
    <Directory "path/to/public">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Order Deny,Allow
		Allow from all
		Require local
	</Directory>
</VirtualHost>
```
- add local domain in windows hosts file
- run composer install (in root project)