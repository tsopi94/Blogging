<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title', 'for_link', 'user_id', 'post', 'abbreviation', 'image', 'published', 'tags'];
    protected $appends = ['year', 'month', 'day', 'hour', 'min', 'sec', 'month_in_word', 'time'];

    public function vzt()
    {
        return visits($this);
    }


    /**
     * Set for_link attribute
     *
     * @return void
     */
    public function setForLinkAttribute() {
      $url = $this->attributes['title'];
      $url = preg_replace('#Ç#', 'C', $url);
      $url = preg_replace('#ç#', 'c', $url);
      $url = preg_replace('#è|é|ê|ë#', 'e', $url);
      $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
      $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
      $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
      $url = preg_replace('#ì|í|î|ï#', 'i', $url);
      $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
      $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
      $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
      $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
      $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
      $url = preg_replace('#ý|ÿ#', 'y', $url);
      $url = preg_replace('#Ý#', 'Y', $url);

      $text = preg_replace("#[^a-zA-Z0-9 \-]#","",$url);
      $text_1 = str_replace("  ", " ", $text);
      $text_1 = str_replace("  ", " ", $text_1);
      $text_2 = str_replace(" ", "-", $text_1);

      $this->attributes['for_link'] = strtolower("$text_2.html");
    }



    /**
     * Set abbreviation attribute
     *
     * @return void
     */
    public function setAbbreviationAttribute() {
      $max = 150;
      $text = $this->attributes['post'];
      $text = strip_tags($text);
       if (strlen($text) > $max)
       {
           $espace = strpos($text,' ',$max);
           $morceau = substr($text,0,$espace).' [...]';
       }
       else
       {
           $morceau = $text;
       }

       $this->attributes['abbreviation'] = $morceau;

    }



   /**
    *
    * @param integer $m
    * @return string
    */
    public function getMonthInWordAttribute() {
      $v = $this->created_at;
      $date_time = explode(' ', $v);
      $date = explode('-', $date_time[0]);
      $m = $date[1];
    switch ($m) {
      case 1:
        $m="Jan";
        break;

      case 2:
        $m="Feb";
        break;

      case 3:
        $m="Mar";
        break;

      case 4:
        $m="Apr";
        break;

      case 5:
        $m="May";
        break;

      case 6:
        $m="Jun";
        break;

      case 7:
        $m="Jul";
        break;

      case 8:
        $m="Aug";
        break;

      case 9:
        $m="Sep";
        break;

      case 10:
        $m="Oct";
        break;

      case 11:
        $m="Nov";
        break;

      case 12:
        $m="Dec";
        break;

      default:
        $m="Inv";
        break;
    }
    return $m;
  }


  /**
   *
   *
   * @return integer
   */
  public function getYearAttribute(){

    $v = $this->created_at;
    $date_time = explode(' ', $v);
    $date = explode('-', $date_time[0]);
    $Y = $date[0];

  if(empty($Y)) {
      $Y = null;
    }

  return $Y;

  }


  /**
   *
   *
   * @return integer
   */
  public function getDayAttribute(){

    $v = $this->created_at;
    $date_time = explode(' ', $v);
    $date = explode('-', $date_time[0]);
    $D = $date[2];

  if(empty($D)) {
      $D = null;
    }

  return $D;

  }


  /**
   *
   *
   * @return integer
   */
  public function getMonthAttribute(){

    $v = $this->created_at;
    $date_time = explode(' ', $v);
    $date = explode('-', $date_time[0]);
    $M = $date[1];

  if(empty($M)) {
      $M = null;
    }

  return $M;

  }


  /**
   *
   *
   * @return integer
   */
  public function getHourAttribute(){

    $v = $this->created_at;
    $date_time = explode(' ', $v);
    $time = explode(':', $date_time[1]);
    $h = $time[0];

  if(empty($h)) {
      $h = null;
    }

  return $h;

  }



  /**
   *
   *
   * @return integer
   */
  public function getMinAttribute(){

    $v = $this->created_at;
    $date_time = explode(' ', $v);
    $time = explode(':', $date_time[1]);
    $m = $time[1];

  if(empty($m)) {
      $m = null;
    }

  return $m;

  }


  /**
   *
   *
   * @return integer
   */
  public function getSecAttribute(){

    $v = $this->created_at;
    $date_time = explode(' ', $v);
    $time = explode(':', $date_time[1]);
    $s = $time[2];

  if(empty($s)) {
      $s = null;
    }

  return $s;

  }


  /**
   *
   *
   * @return string
   */
  public function getTimeAttribute(){

    $v = $this->created_at;
    $date_time = explode(' ', $v);
    $time = $date_time[1];

  if(empty($time)) {
      $time = null;
    }

  return $time;

  }


}
