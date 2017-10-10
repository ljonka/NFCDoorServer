# NFCDoorServer
Laravel 5.5 based Restfull API DB Server for NFC Door System

## Installation

 git clone git@github.com:ljonka/NFCDoorServer.git

 cd NFCDoorServer

 touch database/database.sqlite

 cp .env.example .env #change DB_DATABASE to suite your needs

 php artisan migrate

 php artisan passport:install

 #point your webserver to public directory of this app or use artisan Serve

 php artisan serve

## Api calls

### Doors
#### List Doors

Request:
- GET: http://zugang.alwo.tr-r.de/api/door
- Auth: Bearer Token in Header "authorization: Bearer ..."

Returns:
{
	"elements": [
		{
			"id": 2,
			"created_at": "2017-09-29 20:52:01",
			"updated_at": "2017-10-03 21:28:22",
			"name": "Haustüre",
			"description": "blatt",
			"api_key": "..."
    }
  ]
}

#### Add door

Request:
- POST: http://zugang.alwo.tr-r.de/api/door
- Auth: Bearer Token in Header "authorization: Bearer ..."
- Query Params:
  - name: "Door Name"
  - description: "Door Description"

Returns:
{
	"door": {
		"name": "TestName2",
		"description": "TestDescription2",
		"api_key": "...",
		"updated_at": "2017-10-10 20:42:45",
		"created_at": "2017-10-10 20:42:45",
		"id": 5
	}
}

### doorUsers
#### List doorUsers

Request:
- GET: http://zugang.alwo.tr-r.de/api/doorUsers
- Auth: Bearer Token in Header "authorization: Bearer ..."

Returns:
{
	"elements": [
		{
			"id": 1,
			"created_at": "2017-09-28 21:28:36",
			"updated_at": "2017-09-28 21:28:36",
			"chip_uuid": "_xx_xx_xx_xx",
			"name": "test",
			"phone": "432423",
			"email": "info@me.com",
			"note": "fdfds"
		}
	],
	"logs": [
		{
			"chip_uuid": "_xx_xx_xx_xx",
			"data": "unknown",
			"created_at": "2017-10-06 22:24:50"
		}
	]
}

logs containing only chip_uuid's which are not related to some user yet.

#### Add doorUser

Request:
- POST: http://zugang.alwo.tr-r.de/api/doorUsers
- Auth: Bearer Token in Header "authorization: Bearer ..."
- Query Params:
  - chip_uuid: "... from log or android nfc sensor in given format"
  - name: ""
  - phone: ""
  - email: ""
  - note: ""

Returns:
{
	"person": {
		"chip_uuid": "_xx_xx_xx_xx",
		"name": "TestUser",
		"phone": "TestPhone",
		"email": "Test@Mail.com",
		"note": "Test Group",
		"updated_at": "2017-10-10 20:33:30",
		"created_at": "2017-10-10 20:33:30",
		"id": 4
	}
}

#### Update doorUser

Request:
- PATCH: http://zugang.alwo.tr-r.de/api/doorUsers/{id}
- Auth: Bearer Token in Header "authorization: Bearer ..."
- Query Params:
  - chip_uuid: "... from log or android nfc sensor in given format"
  - name: ""
  - phone: ""
  - email: ""
  - note: ""

Returns:
{
	"person": {
		"chip_uuid": "_xx_xx_xx_xx",
		"name": "TestUser",
		"phone": "TestPhone",
		"email": "Test@Mail.com",
		"note": "Test Group",
		"updated_at": "2017-10-10 20:33:30",
		"created_at": "2017-10-10 20:33:30",
		"id": 4
	}
}

#### Remove doorUser

Request:
- DEL: http://zugang.alwo.tr-r.de/api/doorUsers/{id}
- Auth: Bearer Token in Header "authorization: Bearer ..."

Returns:
{
	"personRemoved": true
}
