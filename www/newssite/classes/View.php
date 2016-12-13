<?php

class View
{
    protected $_template;
    protected $data = [];

    public function _construct($template)
    {
        if(file_exists($template)){
            $this->_template = $template;
        } else {
            echo ('Шаблон' . $template . 'не найден');
        }
    }
    public function assign ($name, $value)
    {
        $this->data[$name] = $value;
    }
    /*public  function data ($data)
    {
        foreach ($data as $dat){
            $this->_data [] = $dat;
        }
        return $this->_data;
        ob_start();
        extract($data);
        ob_get_clean();
    }*/
    public function display ($template)
    {
        //$this->data['data'] --> $data
        foreach ($this->data as $key => $value){
            $$key = $value;
            //var_dump($$key); die;
        }
        include __DIR__ . '/../views/' . $template;
    }
}