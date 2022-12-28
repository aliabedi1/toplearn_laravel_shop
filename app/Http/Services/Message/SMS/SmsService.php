<?php 

namespace App\Http\Services\Message\SMS;

use App\Http\Interfaces\MessageInterface;

class SmsService implements MessageInterface
{
    //private variables

    private $from;
    private $text;
    private $to;
    private $isFlash = true;


    //getters and setters

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }


    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }


    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }


    public function getIsFlash()
    {
        return $this->isFlash;
    }

    public function setIsFlash($isFlash)
    {
        $this->isFlash = $isFlash;
    }


    

    public function fire()
    {
        $meliPayamak = new MeliPayamakService();

        return $meliPayamak->sendSmsSoapClient($this->from , $this->to , $this->text , $this->isFlash);

    }



}