<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'email', 'name', 'comment', 'visitor_ip', 'response_to', 'level'];
    protected $appends = ['year', 'month', 'day', 'hour', 'min', 'sec', 'month_in_word', 'time'];



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
         $m="January";
         break;

       case 2:
         $m="Febuary";
         break;

       case 3:
         $m="March";
         break;

       case 4:
         $m="April";
         break;

       case 5:
         $m="May";
         break;

       case 6:
         $m="June";
         break;

       case 7:
         $m="July";
         break;

       case 8:
         $m="August";
         break;

       case 9:
         $m="September";
         break;

       case 10:
         $m="October";
         break;

       case 11:
         $m="November";
         break;

       case 12:
         $m="December";
         break;

       default:
         $m="Invalid month number";
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
