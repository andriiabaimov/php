<?php

class CurlRequest
{
    private $ch;

    function __construct($options = array())
    {
        $this->ch_init();
        $this->ch_setopt($options);
        $this->ch_exec();
        $this->ch_close();
    }

    private function ch_init()
    {
        $this->ch = curl_init();
    }

    private function ch_setopt($options = array())
    {
        curl_setopt_array($this->ch, $options);
    }

    private function ch_exec()
    {
        $this->header = curl_exec($this->ch);
        $this->code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
    }

    private function ch_close()
    {
        curl_close($this->ch);
    }

    public function get_header()
    {
        return $this->header;
    }

    public function get_code()
    {
        return $this->code;
    }
}
