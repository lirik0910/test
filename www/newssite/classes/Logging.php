<?php

namespace Application\Classes;

class Logging
{
    private $date;
    public $place;
    public $message;
    private $data = [];
    private $file;

    public function __construct()
    {
        $this->date = date(DATE_RFC850);
        $this->file = __DIR__ . '/../log.txt';
    }

    public function record()
    {
        if(file_exists($this->file)){
            $this->data = ['time' => $this->date, 'place' => $this->place, 'message' => $this->message];
            return file_put_contents($this->file, implode(', ', $this->data), FILE_APPEND);
        } else{
            echo 'Файл не найден!';
        }
    }
    public function read()
    {
        if(file_exists($this->file)){
            return file_get_contents($this->file, false);
        } else{
            echo 'Файл не найден!';
        }

    }
}