<?php

class Admin {

    static protected $database;
    static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'username', 'hashed_password'];

    public $errors = [];

    static public function set_database($database) {
        self::$database = $database;
    }

    static public function find_by_sql($sql) {
       $result = self::$database->query($sql);
         if(!$result) {
            exit("Query failed.");
        }
        // turn results into objects
        $object_array = [];

        while($record = $result->fetch_assoc()) {
            $object_array[] = self::instantiate($record);
        }

        $result->free();
//     die(var_dump($result) .'<br><br>' .var_dump($object_array));

        return $object_array;
    }

    static public function find_all(){
        $sql = "SELECT * FROM admin";
        return self::$database->query($sql);
    }

    static public function find_by_id($id){
        $sql = "SELECT * FROM admin ";
        $sql .= "WHERE id='". $id ."'";

       $obj_array = self::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    static protected function instantiate($record) {
        $object = new self;
        foreach($record as $property => $value) {
           if(property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

    protected function validate() {
        $this->errors = [];

        if(!empty($this->errors)) { return false; }
        return $this->errors;
    }

    protected function create(){
        $this->validate();

        $attributes = $this->sanitized_attributes();
        $sql ="INSERT INTO admin (";
        $sql .= join(', ', self::$db_columns);
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        $result = self::$database->query($sql);
       if($result) {
            $this->id = self::$database->insert_id;
        }
        return $result;
    }

    protected function update() {
        $this->validate();
        if(!empty($this->errors)) { return false; }

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE admin SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
//die($sql);
       return $result;
    }

    public function save() {
        if(isset($this->id)) {
            return $this->update();
        } else {
            return $this->create();
        }
    }

    public function merge_attributes($args=[]) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
//        echo var_dump($args);
            }
        }
    }

    // database columns to properties
    public function attributes() {
        $attributes = [];
        foreach(self::$db_columns as $column) {
            if($column == 'id') { continue; }
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function sanitized_attributes() {
        $sanitized = [];
        foreach($this->attributes() as $key => $value) {
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }

    public function delete() {
        $sql = "DELETE FROM admin ";
        $sql .= "WHERE id='". self::$database->escape_string($this->id) ."' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
    }

    //End Active Record Code


    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $username;
    protected $hashed_password;
    public $password;
    public $confirm_password;

    public function __construct($args=[]) {
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';
    }

    public function full_name() {
        return $this->first_name . " " . $this->last_name;
    }

}

?>
