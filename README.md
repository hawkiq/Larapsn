<p align="center"><a href="https://trophyguide.osama.app/" target="_blank"><img src="https://trophyguide.osama.app/images/assets/logo.png" width="400"></a></p>

## About LaraPSN

getting player stats for Playstation trophies is easy task but required paid services around 20$ per month, so since I love gaming and coding I decided to make my own simple API to bring basic information for players such as number of trophies or their avatar and last game played etc..

- [OsaMa Soft](https://osama.app).
- [Trophy Guide Website](https://trophyguid.osama.app).

if you looking for php class without using Laravel you can use this [PSNApi](https://github.com/hawkiq/PSNApi)

## Installation

import package into your project using composer

`composer require hawkiq/larapsn`

## Usage

create new object

```
$psnID = "hawkiq";
$psnapi = new HawkiqPSN($psnID);

```

note that the class take initial parameter which is Player PSN ID

`$playerInfo = $psnapi->getInfos();`

this will return array of info and use it like you want :)

```
Array
(
    [username] => hawkiq
    [about] => * Founder of Iraqi PlayStation Players Leaderboard  •  * instagram:hawkiq  •  oJJI IJI oJI IJ
    [avatar] => https://i.psnprofiles.com/avatars/l/G4613a5e4c.png
    [trophies] => Array
        (
            [total] => 5441
            [platinum] => 110
            [gold] => 401
            [silver] => 1068
            [bronze] => 3862
        )

    [level] => 406
    [lastgame] => Horizon Zero Dawn
    [played] => 153
    [completion] => 74.96
    [complgames] => 77
    [hiddentrophies] => 0
)
```

## Security Vulnerabilities

If you discover a security vulnerability within Larapsn, please send an e-mail to OsaMa via [me@osama.app](mailto:me@osama.app). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
