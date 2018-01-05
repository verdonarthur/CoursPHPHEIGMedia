<?php

class DB {

    private $hostname;
    private $username;
    private $password;
    private $database;
    private $driver;
    private $pdo;
    private $build_request;
    private $result_request;

    public function __construct($db_conf) {
        $this->build_request = "";

        if (empty($db_conf)) {
            throw new RuntimeException("no param for the conf");
        }

        $this->hostname = $db_conf['hostname'];
        $this->username = $db_conf['username'];
        $this->password = $db_conf['password'];
        $this->database = $db_conf['database'];
        $this->driver = isset($db_conf['driver']) ? $db_conf['driver'] : "mysql";

        try {
            $this->pdo = new PDO($this->driver . ':host=' . $this->hostname . ';dbname=' . $this->database, $this->username, $this->password);
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function query($query) {
        $this->build_request = $query;

        return $this;
    }

    public function select($row = array()) {
        $this->build_request = "SELECT ";
        if (empty($row)) {
            $this->build_request .= "*";
        } else {
            if (is_array($row))
                $this->build_request .= implode(',', $row);
            else
                $this->build_request .= $row;
        }
        return $this;
    }

    public function insert($row = array(), $table = '') {
        $this->build_request = 'INSERT INTO `' . $table . '` ';
        $insert_row = array();
        $insert_value = array();

        if (!empty($row)) {
            foreach ($row as $name_row => $value) {
                $insert_row[] = '`' . $name_row . '`';
                $insert_value[] = $this->pdo->quote($value);
            }
            $this->build_request .= ' (' . implode(',', $insert_row) . ')';
            $this->build_request .= ' VALUES (' . implode(',', $insert_value) . ')';
        }
        return $this;
    }

    public function from($table) {
        $this->build_request .= " FROM ";
        if (isset($table) && !empty($table)) {
            if (is_array($table)) {
                $this->build_request .= implode(",", $table);
            } else {
                $this->build_request .= '`' . $table . '`';
            }
        } else {
            exit("from function must have at min one table name");
        }
        return $this;
    }

    public function where($condition) {
        $where = " WHERE ";
        $where .= '`' . $condition[0] . '`' . $condition[1] . $this->pdo->quote($condition[2]);

        $this->build_request .= $where;

        return $this;
    }

    public function and_where($condition) {
        $and_where = " AND ";
        $and_where .= '`' . $condition[0] . '`' . $condition[1] . $this->pdo->quote($condition[2]);


        $this->build_request .= $and_where;

        return $this;
    }

    public function or_where($condition) {
        $or_where = " OR ";
        $or_where .= '`' . $condition[0] . '`' . $condition[1] . $this->pdo->quote($condition[2]);

        $this->build_request .= $or_where;

        return $this;
    }

    private function order($row, $ascOrDesc) {
        $this->build_request .= 'ORDER BY ' . $row . ($ascOrDesc ? " ASC" : " DESC");
    }

    public function order_by_asc($row) {
        $this->order($row, 1);

        return $this;
    }

    public function order_by_desc($row) {
        $this->order($row, 0);

        return $this;
    }

    public function execute() {
        $this->result_request = $this->pdo->query($this->build_request);

        return $this;
    }

    public function get_sql_request_string() {
        return $this->build_request;
    }

    public function fetch_obj($class_to_use = 'stdClass') {
        $result = array();

        foreach ($this->result_request->fetchAll(PDO::FETCH_CLASS, $class_to_use) as $row) {
            $result[] = $row;
        }
        return $result;
    }

    public function __destruct() {
        $this->pdo = null;
    }

}
