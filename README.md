<p align="center"><a href="https://trophyguide.osama.app/" target="_blank"><img src="https://trophyguide.osama.app/images/assets/logo.png" width="400"></a></p>

## About LaraPSN

getting player stats for Playstation trophies is easy task but required paid services around 20$ per month, so since I love gaming and coding I decided to make my own simple API to bring basic information for players such as number of trophies or their avatar and last game played etc..

if you looking for php class without using Laravel you can use this [PSNApi](https://github.com/hawkiq/PSNApi)

## Installation

import package into your project using composer

```
composer require hawkiq/larapsn
```

## Usage

initial using PSN id

```
use Hawkiq\Larapsn\HawkiqPSN;
// rest of used classes

$psnID = "hawkiq";
$psnapi = new HawkiqPSN($psnID);
```

Now you can get All player info using one method

```
$playerInfo = $psnapi->getInfos();
```

Here is the final output from getInfos method

```
{
  "username": "hawkiq ",
  "about": "* Founder of Iraqi PlayStation Players Leaderboard&nbsp;&nbsp;•&nbsp;&nbsp;* instagram:hawkiq&nbsp;&nbsp;•&nbsp;&nbsp;oJJI IJI oJI IJ",
  "avatar": "https://i.psnprofiles.com/avatars/l/G4613a5e4c.png",
  "trophies": {
    "total": 5595,
    "platinum": 112,
    "gold": 404,
    "silver": 1090,
    "bronze": 3989
  },
  "level": "409",
  "lastgame": "A Plague Tale: Innocence",
  "played": "158",
  "completion": "73.62",
  "complgames": "78",
  "hiddentrophies": 0
}
```

## Security Vulnerabilities

If you discover a security vulnerability within Larapsn, please send an e-mail to OsaMa via [me@osama.app](mailto:me@osama.app). All security vulnerabilities will be promptly addressed.

## Preview

this class used in following sites

- [Trophy Guide Website](https://trophyguide.osama.app).

feel free to contact me if you want to add your site.

## License

Larapsn is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
