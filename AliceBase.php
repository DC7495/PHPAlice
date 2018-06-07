<?

class AliceBase
{
    /**
     * AliceBase constructor.
     */
    public function __construct($session, $request, $meta, $version)
    {
        $this->session = $session;
        $this->request = $request;
        $this->meta = $meta;
        $this->version = $version;
    }

    public function isNew()
    {
        return $this->session['new'];
    }

    public function getCommand()
    {
        return $this->request['command'];
    }

    public function checkRequestForKeyWord($keyword)
    {

        if (strpos(strtolower($this->getCommand()), $keyword)!==false) return true;
//        echo strpos(strtolower($this->getCommand()), $keyword);
        return false;
    }

    public function printAnswer($text, $tts, $buttons = array(), $end_session = false)
    {
        $answer['response'] = array(
            "text"        => $text,
            "tts"         => $tts,
            "buttons"     => $buttons,
            "end_session" => $end_session,
        );
        $answer['session'] = $this->session;
        $answer['version'] = $this->version;
        echo json_encode($answer);
    }
}