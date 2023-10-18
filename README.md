# Toucan_task  
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

![Members](https://github.com/JishnuLBU/Toucan_task/assets/144449557/4cc186c8-8f83-4367-81fe-ad67bb103dce)
![add member](https://github.com/JishnuLBU/Toucan_task/assets/144449557/3acc54bb-a30c-4024-b413-e9b4b0e52d82)
![Chart](https://github.com/JishnuLBU/Toucan_task/assets/144449557/4f5fdbf5-bedd-416c-a205-ce8cf7b83ac2)
