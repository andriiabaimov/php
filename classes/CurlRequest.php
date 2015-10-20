<?php

class CurlRequest
{
    private $ch, $header, $code;

    function __construct($options = array())
    {
        $this->ch_init();
    }

    private function ch_init()
    {
        $this->ch = curl_init();
    }

    public function ch_setopt($option, $value)
    {
        curl_setopt($this->ch, $option, $value);
    }

    public function ch_exec()
    {
        $this->header = curl_exec($this->ch);
        $this->code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
    }

    public function ch_close()
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
