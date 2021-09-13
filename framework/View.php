<?php

class View
{
    protected $_view;
    protected $_layout;
    protected $_params = [];

    public function __construct($view,$params){

        $this->_view = $view;
        $this->_params = $params;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->_view;
    }

    /**
     * @param mixed $view
     */
    public function setView($view): void
    {
        $this->_view = $view;
    }

    public function renderFile(){
        ob_start();
        ob_implicit_flush(false);
        extract($this->_params, EXTR_OVERWRITE);
        require $this->_view;
        $result = ob_get_contents();
        if (strpos($this->_view,'layout')) {ob_end_flush();} else{ob_end_clean();};
           return $result;


    }

}