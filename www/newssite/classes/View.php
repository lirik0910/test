<?php

namespace Application\Classes;

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
    /*public function assign ($name, $value)
    {
        $this->data[$name] = $value;
    }*/
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __get($name)
    {
        return $this->data[$name];
    }
    public function render ($template)
    {
        //$this->data['data'] --> $data
        foreach ($this->data as $key => $value){
            $$key = $value;
            //var_dump($$key); die;
        }

        ob_start();
        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    public function display($template)
    {
        echo $this->render($template);
    }
}