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

    protected function coupleTag ($name, $attr='', $text='') 
    {
        if($attr != ''){
            $addAttr = ' $attr';
        }
        $this->inputTag .= "\t<$name$attr>$text</$name>\n";
    }

    function addTextarea($attr='', $text='')
    {
        return  $this->coupleTag('textarea', $attr, $text);
    }

    function addButton($attr='', $text='')
    {
        return  $this->coupleTag('button', $attr, $text);
    }

    function addBr()
    {
        $this->inputTag .= "<br>";
    }

    function show_form()
    {
        return "<form method=\"$this->method\" action=\"$this->action\">\n$this->inputTag</form>";
    }
}

$obj = new Form('post', 'index.php');
$obj->add_input('text', 'login', '');
$obj->addBr();
$obj->add_input('password', 'password', '');
$obj->addBr();
$obj->addTextarea(' rows="10" cols="10"', '123');
$obj->addBr();
$obj->addButton(' value="ok"', 'Take');
$obj->addBr();
$obj->add_input('submit', '', 'Send');

echo $obj->show_form();
?>