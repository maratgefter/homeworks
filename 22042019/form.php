<?

class Form 
{
    protected $action;
    protected $method;
    protected $inputTag = "";

    function __construct($method, $action)
    {
        $this->action = $action;
        $this->method = $method;
    }

    function add_input($type, $name='', $value='')
    {
        $addName = "";
        if($name != '' ) {
            $addName = " name='$name'";
        } 

        $addvalue = "";
        if($value != '' ) {
            $addvalue = " value='$value'";
        } 

        $this->inputTag .= "\t<input type='$type'$addName$addvalue>\n";
    }

    protected function coupleTag ($name, $attr="", $text="") 
    {
        $this->inputTag .= "\t<$name". $attr=($attr != '') ? $attr : ''.">$text</$name>\n";
    }

    function addTextarea($attr="", $text="")
    {
        return  $this->coupleTag('textarea', $attr="", $text="");
    }

    function show_form()
    {
        return "<form method=\"$this->method\" action=\"$this->action\">\n$this->inputTag</form>";
    }
}

$obj = new Form('post', 'index.php');
$obj->add_input('text', 'login', '');
$obj->add_input('password', 'password', '');
$obj->add_input('submit', '', 'Send');
$obj->addTextarea('', '');
//$obj->coupleTag('button', '', 'Take');

echo $obj->show_form();
?>