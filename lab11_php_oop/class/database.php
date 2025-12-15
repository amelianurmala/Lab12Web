<?php
class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig()
    {
        // GUNAKAN GLOBAL $config karena config.php sudah di-include di index.php
        global $config;
        
        // VALIDASI: cek apakah $config ada
        if (!isset($config) || !is_array($config)) {
            die("ERROR: Configuration not loaded. Make sure config.php is included before Database class.");
        }
        
        // VALIDASI: cek key yang diperlukan
        $required = ['host', 'username', 'password', 'db_name'];
        foreach ($required as $key) {
            if (!isset($config[$key])) {
                die("ERROR: Missing configuration key: '{$key}'");
            }
        }
        
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null)
    {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        $sql = $this->conn->query($sql);
        $sql = $sql->fetch_assoc();
        return $sql;
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            $column = [];
            $value = [];
            
            foreach ($data as $key => $val) {
                $column[] = $key;
                $value[] = "'{$val}'";
            }
            
            $columns = implode(",", $column);
            $values = implode(",", $value);
        }
        
        $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $values . ")";
        $query = $this->conn->query($sql);
        
        if ($query == true) {
            return $this->conn->insert_id;  // Kembalikan ID yang baru di-insert
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        $update_value = [];
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $update_value[] = "$key='{$val}'";
            }
            $update_value = implode(",", $update_value);
        }
        
        $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where;
        $query = $this->conn->query($sql);
        
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
}
?>