<?

    abstract class BaseActiveRecord
    {
        public static $pdo;
        protected static $table;
        protected static $PK;

        abstract public function createRecord();
        abstract public static function getTableInfo();
        abstract public static function getColumnInfo();

        public static function connect($user, $password)
        {
            try
            {
                self::$pdo = new PDO('mysql:host=localhost;dbname=webLR;charset=utf8', $user, $password);
            }
            catch (PDOException $e)
            {
                echo "Ой-ей, ошибочка: ".$e->getMessage().'<br>';
            }
        }

        public function save()
        {
            $record = $this->createRecord();
            $tableInfo = static::getTableInfo();
            if (isset($record['id']))
            {
                return BaseActiveRecord::updateAR($tableInfo['table'], $tableInfo['PK'], $record);
            }
            else
            {
                return BaseActiveRecord::insertAR($tableInfo['table'], $tableInfo['PK'], $record);
            }
        }

        public function delete()
        {
            $record = $this->createRecord();
            $tableInfo = static::getTableInfo();
            return BaseActiveRecord::deleteAR($tableInfo['table'], $tableInfo['PK'], $record[$tableInfo['PK']]);
        }

        public static function select($id)
        {
            $tableInfo = static::getTableInfo();
            return BaseActiveRecord::selectAR($tableInfo['table'], $tableInfo['PK'], $id);
        }

        public static function limit($start, $count)
        {
            $tableInfo = static::getTableInfo();
            return BaseActiveRecord::limitAR($tableInfo['table'], $start, $count);
        }

        protected static function updateAR($table, $PK, $fields)
        {
            $query = "UPDATE $table SET ";
            foreach ($fields as $key => $val)
                if ($key != $PK)
                    $query = $query."$key='$val',";
            $query = substr($query, 0, -1);
            $query = $query."WHERE $PK = ".$fields[$PK];
            $res = self::$pdo->query($query);
            if (!$res)
                return $res;
            else
                return $res->fetchAll();
        }

        protected static function insertAR($table, $PK, $fields)
        {
            $query = "INSERT INTO $table (";
            $vals = 'VALUES (';
            foreach ($fields as $key => $val)
                if ($key != $PK)
                {
                    $query = $query."$key,";
                    $vals = $vals."\"$val\",";
                }
            $query = substr($query, 0, -1);
            $vals = substr($vals, 0, -1);
            $query = $query.') '.$vals.')';
            $res = self::$pdo->query($query);
            if (!$res)
                return $res;
            else
                return $res->fetchAll();
        }

        protected static function deleteAR($table, $PK, $PKValue)
        {
            $query = "DELETE FROM $table WHERE $PK = $PKValue";
            $res = self::$pdo->query($query);
            if (!$res)
                return $res;
            else
                return $res->fetchAll();
        }

        protected static function selectAR($table, $PK, $PKValue)
        {
            $query = "SELECT * FROM $table WHERE $PK = $PKValue";
            $res = self::$pdo->query($query);
            if (!$res)
                return $res;
            else
                return $res->fetchAll();
        }

        protected static function limitAR($table, $start, $count)
        {
            $query = "SELECT * FROM $table LIMIT $start, $count";
            $res = self::$pdo->query($query);
            if (!$res)
                return $res;
            else
                return $res->fetchAll();
        }
    }

?>