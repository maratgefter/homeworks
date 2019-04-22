<?

class Form {
    protected $name;
    protected $text;
    protected $attrName = "";
    protected $attrValue = "";

    function __construct ($name, $attrName, $attrValue, $text = null) {
        $this->name = $name;
        $this->text = $text;
        $this->attrName = $attrName;
        $this->attrValue = $attrValue;
    }

    function show_form () {
        $str = "";
        if ($this->attrName != "" && $this->attrValue != "") {
            if (is_array($this->attrName) && is_array($this->attrValue)) {
                foreach (array_combine($this->attrName, $this->attrValue) as $v => $v2) {
                    $str .= " $v=\"$v2\"";
                }
            } else {
                $str = " $this->attrName=\"$this->attrValue\"";
            }
        }
        if ($this->name == "textarea" || $this->name == "button") {
            return "<$this->name$str>$this->text</$this->name>";
        } else if ($this->name == "input") {
            return "<$this->name$str>";
        }
    }
}

$obj = new Form ('input', 'type', 'text');
$obj2 = new Form ('textarea', ['name', 'cols', 'rows'], ['text_example', '50', '25'], 'текстовая область');
$obj3 = new Form ('input', ['type', 'name', 'placeholder'], ['password', 'password', 'Введите ваш пароль']);
$obj4 = new Form ('button', 'name', 'button', 'Ok');

echo "<form>";
echo $obj -> show_form ();
echo $obj2 -> show_form ();
echo $obj3 -> show_form ();
echo $obj4 -> show_form ();
echo "<form>";

?>