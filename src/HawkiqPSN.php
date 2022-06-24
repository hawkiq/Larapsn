<?php

/**
 * Created by OsaMa Soft.
 * User: Osama
 * Date: 12/03/2022
 * @author OsaMa hawkiq
 * @version 1.0.5
 * @package hawkiq/larapsn
 */


namespace Hawkiq\Larapsn;

use KubAT\PhpSimple\HtmlDomParser;

class HawkiqPSN
{
    private $psnid;

    /**
     * hawkiqPSN constructor.
     * @param $psnid
     */

    /**
     * The function takes a string as an argument and returns a string
     * 
     * @param psnid The PSN ID of the user you want to get the trophies for.
     */
    public function __construct($psnid)
    {
        $this->psnid = $psnid;
    }

    /*
    * createHtmlObject get dom and save it for parsing to save bandwidth
    */
  /**
   * It takes a url and returns the html of that url.
   * 
   * @param type 1 = profile, 2 = stats
   * 
   * @return The HTML of the page.
   */
    private function createHtmlObject($type = 1)
    {
        switch ($type) {
            case 1:
                $url = 'https://psnprofiles.com/' . $this->psnid . '/';
                break;
            case 2:
                $url = 'https://psnprofiles.com/' . $this->psnid . '/stats';
                break;
            default:
                $url = 'https://psnprofiles.com/' . $this->psnid . '/';
                break;
        }
        $html = HtmlDomParser::file_get_html($url);
        return $html;
    }
    /*
    * getAvatar parse dom and get link for avatar
    */
   /**
    * It finds the meta tag with the property of og:image and returns the content of that tag.
    * 
    * @param html the HTML of the page you want to scrape
    * 
    * @return The avatar of the user.
    */
    private function getAvatar($html)
    {
        $avatar = "";
        $avatar = $html->find('meta [property="og:image"]', 0)->content;
        return $avatar;
    }

    /*
    * getTrophies parse dom and get trophies count for player
    */
  /**
   * It takes a string of HTML, finds the text inside of a few <code>&lt;li&gt;</code> tags, removes
   * the commas and percentage signs, and returns an array of integers.
   * 
   * @param html The HTML of the page
   * 
   * @return An array of trophies.
   */
    private function getTrophies($html)
    {
        $trophies = array();
        $total = $html->find('li[class=total]', 0)->plaintext;
        $platinum = $html->find('li[class=platinum]', 0)->plaintext;
        $gold = $html->find('li[class=gold]', 0)->plaintext;
        $silver = $html->find('li[class=silver]', 0)->plaintext;
        $bronze = $html->find('li[class=bronze]', 0)->plaintext;
        $searchfor = array(",", "%");
        $total = str_replace($searchfor, '', $total);
        $platinum = str_replace($searchfor, '', $platinum);
        $gold = str_replace($searchfor, '', $gold);
        $silver = str_replace($searchfor, '', $silver);
        $bronze = str_replace($searchfor, '', $bronze);
        $trophies = array("total" => (int)$total, "platinum" => (int)$platinum, "gold" => (int)$gold, "silver" => (int)$silver, "bronze" => (int)$bronze);
        return $trophies;
    }
   /**
    * It gets the user's information from the PSN website
    * 
    * @return An array of information about the user.
    */
    public function getInfos()
    {
        $html = $this->createHtmlObject();
        $username = trim($html->find('span[class=username]', 0)->plaintext);
        $about = $html->find('span[class=comment]', 0)!= null ?$html->find('span[class=comment]', 0)->plaintext : '';
        $level = $html->find('li[class=icon-sprite level]', 0)->plaintext;
        $trophies = $this->getTrophies($html);
        $avatar = $this->getAvatar($html);
        for ($i = 0; $i < 3; $i++) {
            $element = $html->find('span[class=stat grow]', $i)->plaintext;
            $search = array(",","Games Played ", "Completed Games ", "Completion ", "Unearned Trophies  ", "Trophies Per Day  ", "Average Rarity  ", "Views  ", "%");
            $newstr = str_replace($search, '', $element);
            $stats[$i] = $newstr;
        }
        $lastgame = $html->find('a[rel=nofollow]', 2)->plaintext;
        $stats[3] =  $lastgame;
        $hidden = 0;
        $hiddensrc = $html->find('div[id=hidden-trophies]', 0) != null ? $html->find('div[id=hidden-trophies]', 0)->title : '';
        if (strlen($hiddensrc) > 0) {
            $hide = explode(' ', $hiddensrc);
            $hidden = str_replace(',','',strip_tags($hide[4]));
        }
        $info = array("username" => $username, "about" => $about, "avatar" => $avatar, "trophies" => $trophies, "level" => $level, "lastgame" => $stats[3], "played" => $stats[0], "completion" => $stats[2], "complgames" => $stats[1], "hiddentrophies" => $hidden);
        return $info;
    }

  /**
   * It takes the text from a website, removes the words "Ultra", "Very", "Rare", "Uncommon", "Common",
   * "(", ")", ",","\t" and then splits the remaining text into an array.
   * 
   * @return An array of the rarity of the cards in the set.
   */
    public function getRarity()
    {
        $info_r = array();
        $html = $this->createHtmlObject(2);
        $rares = $html->find('ul[class=legend]', 3)->plaintext;
        $search = array("Ultra", "Very", "Rare", "Uncommon", "Common", "(", ")", ",","\t");
        $rares = str_ireplace($search, '', $rares);
        $array_rare = explode(' ', $rares);
        $info_r = array("ultrarare" => $array_rare[4], "veryrare" => $array_rare[8], "rare" => $array_rare[11], "uncommon" => $array_rare[14], "common" => $array_rare[17]);
        return $info_r;
    }
}