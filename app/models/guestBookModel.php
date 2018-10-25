<?

include "app/core/baseActiveRecord.php";

    class GuestBookModel extends BaseActiveRecord
    {
        public $id;
        public $dateTime;
        public $name;
        public $email;
        public $message;

        public static $PK = 'id';
        public static $table = 'guestBook';

        public static function getColumnInfo()
        {
            $columnInfo =
            [
                0 => 'id',
                1 => 'dateTime',
                2 => 'name',
                3 => 'email',
                4 => 'message'
            ];
            return $columnInfo;
        }

        public static function getTableInfo()
        {
            $tableInfo =
            [
                'table' => static::$table,
                'PK' => static::$PK
            ];
            return $tableInfo;
        }

        public function createRecord()
        {
            $record = 
            [
                'id' => $this->id,
                'dateTime' => $this->dateTime,
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message
            ];
            return $record;
        }

        public function fromString($strArg)
        {
            if ($strArg == "")

                return false;
            
            $strArg = explode("|", $strArg);

            if (count($strArg) != 4)

                return false;
            
            $this->dateTime = strtotime($strArg[0]);
            $this->dateTime = date('Y-m-d H:i:s', $this->dateTime);
            $this->name = $strArg[1];
            $this->email = $strArg[2];
            $this->message = $strArg[3];

            return true;
        }

        public function toString()
        {
            $str = "";
            $str .= $this->dateTime."|".$this->name."|".$this->email."|".$this->message.PHP_EOL;
            return $str;
        }
    }

?>