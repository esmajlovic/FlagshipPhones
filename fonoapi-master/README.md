[![GitHub stars](https://img.shields.io/github/stars/shakee93/fonoapi.svg)](https://github.com/shakee93/fonoapi/stargazers)
[![GitHub issues](https://img.shields.io/github/issues/shakee93/fonoapi.svg)](https://github.com/shakee93/fonoapi/issues)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/shakee93/fonoapi/master/LICENSE)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/shakee93/fonoapi/.svg?style=social)](https://twitter.com/intent/tweet?text=fonoApi - Mobile Device Description Api (https://github.com/shakee93/fonoapi/) so cool check it out)
# FonoApi - Mobile Device Description Api
#### Logs : 21st September 2016
* Database Updated : 21st September 2016
* Database Updated (New Devices Added) : 27th November 2016
* Database Updated (Old Device Data Updated) : 27th November 2016


https://fonoapi.freshpixl.com/


this is an Api which can provide mobile device descriptions such as model, brand, cpu, gpu, dimensions, release date etc...
it might be helpful if you are building a website lke gsmarena, phonearena or something similar to that. this api contains a database of a mobile device descriptions of android, apple, ios and old phones too.. :D

this is the php class to communicate with the api. it would be nice if someone can help with other languages though. ;)

### Api
Api Url : https://fonoapi.freshpixl.com/v1/

###### Method : getdevice (https://fonoapi.freshpixl.com/v1/getdevice)
available options
  - brand - 
       pass the Mobile Device Brand (example : "samsung", "htc")
  - device* - 
       pass nearly relevent mobile device name (example : "i9305", "A8") 
       this might result multiple results at a time.
  - position -
       when a set of results is returned you can get a specific device by passing the position of your device on the result set. count starts from 0
  - token* -
    - you will need a token to access the Api. no registration, nothing, just grab the key.
      you can get it here https://fonoapi.freshpixl.com/token/generate

###### Method : getlatest (https://fonoapi.freshpixl.com/v1/getlatest)
available options
  - brand - 
       It gives the latest you can filter the brand (example : "samsung", "htc")
  - limit - 
       limit the result count (Max 100)
  - token* -
    - you will need a token to access the Api. no registration, nothing, just grab the key.
      you can get it here https://fonoapi.freshpixl.com/token/generate


------
###### PHP Demo

```
<?php

	include_once("fonoapi-v1.php");

	$apiKey = "xxxxxxxx"; // get your token key here - https://fonoapi.freshpixl.com
	$fonoapi = fonoApi::init($apiKey);
	
		try {

			$res = $fonoapi::getDevice("i9305"); // the device you need to get details here

			foreach ($res as $mobile) {
				if (!empty($mobile->DeviceName)) 	echo "Device : ". $mobile->DeviceName . "<br>";
				if (!empty($mobile->Brand)) 		echo "Brand : ". $mobile->Brand . "<br>";
				if (!empty($mobile->cpu)) 			echo "Cpu : " . $mobile->cpu . "<br>";
				if (!empty($mobile->status)) 		echo "Status : " . $mobile->status . "<br>";
				if (!empty($mobile->dimensions)) 	echo "Dimensions : " . $mobile->dimensions . "<br>";
				if (!empty($mobile->_4g_bands)) 	echo "4g : " .$mobile->_4g_bands . "<br>";
			}

		} catch (Exception $e) {
			echo "ERROR : " . $e->getMessage();
		}

?>
```
------

###### Curl Example

```bash
curl https://fonoapi.freshpixl.com/v1/getdevice -XPOST -H 'Accept: application/json' -d 'token=YOUR_TOKEN_HERE&limit=5&device=A8'
```

###### Python
 Library is here : https://github.com/jesusperiago/fonoapi

###### jQuery
 Library is here : https://github.com/shakee93/fonoapi/tree/master/fonoapi-js

###### Nodejs
 Library is here : https://github.com/mtrung/fonoapi/tree/master/fonoapi-nodejs  
 Package is here : https://www.npmjs.com/package/fonoapi-nodejs

------

##### Result Set Structure
Check here : https://github.com/shakee93/fonoapi/blob/master/resultset.md
