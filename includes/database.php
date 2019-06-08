<!-- author LeHue -->
<?php
/**
 * [database description]
 * Properties : server,username,password,options,pdo,stmt
 * Method :
 * select($field,$table,$condition="1")
 * insert($table,$data,$viewInsert=0)
 * update($table,$data,$condition,$viewUpdate=0)
 * tableNameId($table)
 * checkExists($table,$condition,$viewResult=0)
 */
class Database
{
    // connect info
    private $server = "mysql:host=localhost;dbname=phptest;charset=utf8";
    private $username = "root";
    private $password = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    //protected $conn=null;
    
    private $pdo = null;
    private $stmt = null;
    
    function __construct()
    {
        try {
            $this->pdo = new PDO($this->server, $this->username, $this->password, $this->options);
        }
        catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    function __destruct()
    {
        if ($this->stmt !== null) {
            $this->stmt = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }
    
    /**
     * [select description]
     * @param string|array $field
     * @param string $table
     * @param string|array $condition
     * @return array $result
     // SELECT field1, field2,...fieldN 
     // FROM table_name1, table_name2...
     // [WHERE Clause]
     // [OFFSET M ][LIMIT N]
     */
    
    function select($field, $table, $condition = "1")
    {
        $subCondition = "";
        $subField     = "";
        // check type data $field then process
        if (is_array($field)) {
            foreach ($field as $value) {
                $subField .= " " . $value . ",";
            }
            $subField = (substr($subField, 0, strlen($subField) - 1)) . " ";
        } else {
            $subField = $field;
        }
        
        // check type data $condition then process
        if (is_array($condition)) {
            foreach ($condition as $key => $value) {
                if (!is_numeric($value))
                    ($value = "'" . $value . "'");
                $subCondition .= $key . " = " . $value . " and ";
            }
            $subCondition = (substr($subCondition, 0, strlen($subCondition) - 4));
        } else {
            $subCondition = $condition;
        }
        
        $sql = 'SELECT ' . $subField . ' FROM ' . $table . ' WHERE ' . $subCondition;
        
        //echo $sql;
        
        // select data
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute();
            $result = $this->stmt->fetchAll();
        }
        catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
        
    } // end select
    
    /**
     * [Insert description]
     * @param string $table
     * @param array $data
     * @param bool $viewInsert ( view row inserted )
     * @return bool|array $result
    //  INSERT INTO table_name ( field1, field2,...fieldN )
    //         VALUES          ( value1, value2,...valueN );
     */
    
    function insert($table, $data, $viewInsert = 0)
    {
        $column = "";
        $value  = "";
        $subSql = ' VALUES (';
        foreach ($data as $key => $subValue) {
            $column .= $key . ",";
            if (!is_numeric($subValue))
                ($subValue = "'" . $subValue . "'");
            $value .= "" . $subValue . ",";
        }
        
        $column = (substr($column, 0, strlen($column) - 1));
        $value  = (substr($value, 0, strlen($value) - 1));
        
        $sql = 'INSERT INTO ' . $table . ' (' . $column . ') VALUES (' . $value . ')';
        
        //echo $sql;
        
        // insert data
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute();
            
            // view or not view row inserted
            if ($viewInsert != 0) {
                $id         = $this->pdo->lastInsertId();
                $nameId     = $this->tableNameId($table);
                $condistion = $nameId . "=" . $id;
                $field      = '*';
                $result     = $this->select($field, $table, $condistion);
            } else {
                $result = true;
            } //end view result mode
            
        }
        catch (Exception $ex) {
            die($ex->getMessage());
            $result = false;
        }
        $this->stmt = null;
        return $result;
        
    } //end insert
    
    /**
     * [Update description]
     * @param string $table
     * @param array|string $data
     * @param array|string $condition
     * @param bool $viewUpdate
     * @return bool|array $result
     // UPDATE table_name SET field1 = new-value1, field2 = new-value2
     // [WHERE Clause]
     */
    function update($table, $data, $condition, $viewUpdate = 0)
    {
        $field        = "";
        $subCondition = "";
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (!is_numeric($value))
                    ($value = "'" . $value . "'");
                $field .= $key . ' = ' . $value . ',';
            }
            $field = (substr($field, 0, strlen($field) - 1));
        }
        
        if (is_array($condition)) {
            foreach ($condition as $key => $value) {
                $subCondition .= $key . ' = "' . $value . '",';
            }
            $subCondition = (substr($subCondition, 0, strlen($subCondition) - 1));
        } else {
            $subCondition = $condition;
        }
        
        $sql = 'UPDATE ' . $table . ' SET ' . $field . " where " . $subCondition;
        
        //echo $sql;
        
        // update data
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute();
            
            // view or not view row updated
            if ($viewUpdate != 0) {
                $subField = $this->tableNameId($table);
                $result   = $this->select("*", $table, $subCondition);
            } else {
                $result = true;
            } //end view result mode
            
        }
        catch (Exception $ex) {
            die($ex->getMessage());
            $result = false;
        }
        
        $this->stmt = null;
        return $result;
        
    } //end update
    
    /**
     * [tableNameId description]
     * @param string $table
     * @param array|string $data
     * @param array|string $condition
     * @return string $result
     //SHOW KEYS FROM table WHERE Key_name = 'PRIMARY'
     */
    
    function tableNameId($table)
    {
        $sql        = 'SHOW KEYS FROM ' . $table . ' WHERE Key_name = "PRIMARY"';
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute();
        $subNameId = $this->stmt->fetchAll();
        return $nameId = $subNameId[0]['Column_name'];
    }
    
    /**
     * [tableNameId description]
     * @param string $table
     * @param array|string $condition
     * @return bool|array $result
     //SELECT EXISTS(SELECT 1 FROM table1 WHERE ...)
     */
    
    function checkExists($table, $condition, $viewResult = 0)
    {
        $subCondition = "";
        
        if (is_array($condition)) {
            foreach ($condition as $key => $value) {
                if (!is_numeric($value))
                    ($value = "'" . $value . "'");
                $subCondition .= $key . " = " . $value . " and ";
            }
            $subCondition = (substr($subCondition, 0, strlen($subCondition) - 4));
        } else {
            $subCondition = $condition;
        }
        
        $sql = "SELECT EXISTS(SELECT 1 FROM " . $table . " WHERE " . $subCondition . ")";
        
        //echo $sql; 
        
        //select data
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute();
            $rowCount = $this->stmt->rowCount();
            
            // view or not view row check exist
            if ($viewResult != 0 && $rowCount != 0) {
                $field="*";
                $result = $this->select($field, $table, $subCondition);
                
            } else {
                
                $result = true;
            } //end view result mode
            
        }
        catch (Exception $ex) {
            die($ex->getMessage());
            $result = false;
        }
        
        $this->stmt = null;
        
        return $result;
    }

} // end class Database

//SELECT table_name FROM information_schema.tables WHERE table_schema ='Database Name';
// * select($field,$table,$condition="1")
// * insert($table,$data,$viewInsert=0)
// * update($table,$data,$condition,$viewUpdate=0)
// * tableNameId($table)
// * checkExists($table,$condition,$viewResult=0)

?>