<?

include "app/core/baseActiveRecord.php";

    class BlogModel extends BaseActiveRecord
    {
        public $id;
        public $dateTime;
        public $title;
        public $text;
        public $image;

        public static $PK = 'id';
        public static $table = 'blog';

        public function getColumnInfo()
        {
            $columnInfo =
            [
                0 => 'id',
                1 => 'dateTime',
                2 => 'title',
                3 => 'text',
                4 => 'image'
            ];
            return $columnInfo;
        }

        public function getTableInfo()
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
                'title' => $this->title,
                'text' => $this->text,
                'image' => $this->image
            ];
            return $record;
        }
    }

?>