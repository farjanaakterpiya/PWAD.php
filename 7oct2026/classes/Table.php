namespace Html;

class Table
{
    public $title = "";
    public $rows = 0;
    public function info()
    {
        echo "<p>$this->title has $this->rows rows.</p>";
    }
}