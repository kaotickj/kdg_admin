<?php
class Article {
    //Start ACtive Record Code
    static protected $database;
    static protected $db_columns = ['title', 'category', 'created_date', 'author', 'image', 'description', 'img_alt', 'body', 'active', 'page', 'show_title', 'show_byline', 'no_index', 'hits', 'schemadata', 'moddate', 'modauthor' ];
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
        $sql = "SELECT * FROM articles ORDER BY id DESC";
        return self::$database->query($sql);
    }

    static public function find_by_id($id){
        $sql = "SELECT * FROM articles ";
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

        if(is_blank($this->image)) {
            $this->errors[] = "Article image is required.";
        }
        if(is_blank($this->img_alt)) {
            $this->errors[] = "Image Alt text is required.";
        }
        if(!empty($this->errors)) { return false; }
        return $this->errors;
    }

    protected function create(){
        $this->validate();

        $attributes = $this->sanitized_attributes();
        $sql ="INSERT INTO articles (";
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

        $sql = "UPDATE articles SET ";
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
        $sql = "DELETE FROM articles ";
        $sql .= "WHERE id='". self::$database->escape_string($this->id) ."' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
    }

    //End Active Record Code

    public $id;
    public $title;
    public $category;
    public $created_date;
    public $author;
    public $image;
    public $description;
    public $img_alt;
    public $body;
    public $active;
    public $page;
    public $show_title;
    public $show_byline;
    public $no_index;
    public $hits;
    public $schemadata;
    public $moddate;
    public $modauthor;

	//Constants comma separated values for multiple  
    public const CATEGORIES = ['general', 'articles', 'legal', 'services', 'news'];
    public const AUTHORS = ['Super Admin'];

    public const ACTIVE = ['1', '0'];

    public const SHOW_TITLE = ['1', '0'];

    public const SHOW_BYLINE = ['1', '0'];

    public const NO_INDEX = ['1', '0'];

    public function __construct($args=[]) {
        //$this->brand = isset($args['brand']) ? $args['brand'] : '';
        $this->title = $args['title'] ?? '';
        $this->category = $args['category'] ?? 'general';
        $this->created_date = $args['created_date'] ?? NULL;
        $this->author = $args['author'] ?? 'Super Admin';
        $this->image = '/assets/img/' ?? '';
        $this->image .= $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->img_alt = $args['img_alt'] ?? '';
        $this->body = $args['body'] ?? '';
        $this->active = $args['active'] ?? 1;
        $this->page = $args['page'] ?? '';
        $this->show_title = $args['show_title'] ?? '1';
        $this->show_byline = $args['show_byline'] ?? '0';
        $this->no_index = $args['no_index'] ?? '1';
        $this->schemadata = $args['hits'] ?? '';
        $this->schemadata = $args['schemadata'] ?? '';
        $this->moddate = $args['moddate'] ?? '';
        $this->modauthor = $args['modauthor'] ?? '';
    }
}

?>
