# Toucan_task
# Toucan
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Toucan Tasks Setup

These projects are part of the first-level interview application process for Toucan.

Setting up the Toucan repository requires the following steps:

- Clone project into new folder
  - `git clone https://github.com/JishnuLBU/Toucan.git`
- Make a copy of the `.env.example` file named `.env` 
- Key Generate:<br/>
 `php artisan key:generate`
- Composer update:<br/>
`php composer install`
- Migrate:<br/>
`php artisan migrate --seed`
- Run project:<br/>
`php artisan serve` <br/>
Please use this route  {project_url}/members (http://127.0.0.1:8000/members) <br/>
if excel out doesn't work plese do the following step Edit php.ini: Enable GD Extension: ;extension=gd chnge to extension=gd

