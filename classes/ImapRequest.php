<?php

class ImapRequest
{
    private $mbox, $host;

    function __construct($host, $user, $pass)
    {
        $this->mbox = imap_open($host, $user, $pass);
        $this->host = $host;
    }

    public function close()
    {
        imap_close($this->mbox);
    }

    public function get_folders()
    {
        return imap_list($this->mbox, $this->host, "*");
    }

    public function to_folder($folder)
    {
        imap_reopen($this->mbox, $folder);
    }

    public function get_messages()
    {
        return imap_search($this->mbox, 'ALL');
    }

    public function get_header($key)
    {
        return imap_fetchheader($this->mbox, $key);
    }

    public function get_body($key)
    {
        return imap_fetchbody($this->mbox, $key, 2);
    }
}
