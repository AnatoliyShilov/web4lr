<?

include "app/core/baseActiveRecord.php";

    class TestAsksModel extends baseActiveRecord
    {
        public $id;
        public $dateTime;
        public $name;
        public $q1;
        public $q2;
        public $q3;
        public $q1Right;
        public $q2Right;
        public $q3Right;

        protected static $PK = 'id';
        protected static $table = 'testAsks';

        public static function getColumnInfo()
        {
            $columnInfo =
            [
                0 => 'id',
                1 => 'dateTime',
                2 => 'name',
                3 => 'q1',
                4 => 'q2',
                5 => 'q3',
                6 => 'q1Right',
                7 => 'q2Right',
                8 => 'q3Right'
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
                'q1' => $this->q1,
                'q2' => $this->q2,
                'q3' => $this->q3,
                'q1Right' => $this->q1Right,
                'q2Right' => $this->q2Right,
                'q3Right' => $this->q3Right
            ];
            return $record;
        }
    }

?>