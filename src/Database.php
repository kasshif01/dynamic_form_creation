<?php
namespace Src;
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Set MySQLi to throw exceptions
use mysqli;
use mysqli_result;

date_default_timezone_set('America/Los_Angeles');
class Database
{
    /** @var $database mysqli */
    private $database;

    function __construct(){
        $this->connectDB();
    }

    public function connectDB(){
        try{
             $this->database = new mysqli(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_DATABASE'), getenv('DB_PORT'));
             $this->database->set_charset("utf8");
        }
        catch(\Exception $e) {
            print_r(" MySQL Connection Error: ".$e->getMessage());
            exit;
        }
    }

    /**
     *
     * @param $query string
     * @return mysqli_result|bool For successful SELECT, SHOW, DESCRIBE or
     */
    public function query($query){
        $result = null;
        try{
            $result = $this->database->query($query);
        } catch (\Exception $e){
            print_r(" MySQL Connection Error: ".$e->getMessage(). " - ".mysqli_error($this->database));
            exit;
        }
        return $result;
    }

    /**
     * Insert data in database
     *
     * @param string $db_table
     * @param array $data
     * @return int
     */
    public function insert($db_table, array $data){
        $sql = "INSERT INTO ".$db_table." (".implode(", ", array_keys($data)).") VALUES ('".implode("', '", array_values($data))."')";
        $this->query($sql);
        return $this->database->insert_id;
    }

    /**
     * This function will return a single row always
     *
     * @param string $db_table
     * @param array $where
     * @param $cols
     * @return array
     */
    public function fetchRow($db_table, array $where, $cols="*"){
        $sql = "SELECT ".$cols." FROM ".$db_table." WHERE ".implode(" AND ", $this->_convertKeyValString($where));
        $res = $this->query($sql);
        $row = false;
        if($res->num_rows > 0){
            $row = $res->fetch_assoc();
        }
        return $row;
    }

    /**
     * This function will return a single row always
     *
     * @param string $db_table
     * @param array $where
     * @param $cols string
     * @param $order_by string
     * @param $limit int
     * @return array
     */
    public function fetchAll($db_table, $cols="*"){
        $sql = "SELECT ".$cols." FROM ".$db_table;
        $res = $this->query($sql);
        $rows = false;
        if($res->num_rows > 0){
            $rows = $res->fetch_all(MYSQLI_ASSOC);
        }
        return $rows;
    }

    public function closeDB(){
        $this->database->close();
    }

    private function _convertKeyValString(array $data){
        $cols = [];
        foreach($data as $key=>$val){
            if(is_array($val)){
                $cols[] = $key ." IN (".implode(",", $val).")";
            }
            else{
                if($key == "id") $cols[] = $key."=".$val;
                else $cols[] = $key ."='".addslashes($val)."'";
            }
        }
        return $cols;
    }
}