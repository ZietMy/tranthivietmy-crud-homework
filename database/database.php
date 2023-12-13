<?php
/**
 * Connect to database
 */
$host='localhost';
$database = 'php';
$user='root';
$password='';
function db() {
    $host='localhost';
    $database = 'php';
    $user='root';
    $password='';
    global $db;
    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

}

/**
 * Create new student record
 */
function createStudent($value) {
    global $db;
    // print_r($value);
    try {
      $stmt = $db->prepare("INSERT INTO student(name, age, email, profile) VALUES (:name, :age, :email, :profile)");
  
      $stmt->bindParam(':name', $value['name']);
      $stmt->bindParam(':age', $value['age']);
      $stmt->bindParam(':email', $value['email']);
      $stmt->bindParam(':profile', $value['profile']);
  
      $stmt->execute();
  
      echo "Student created successfully!";
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  
    return $stmt;
  }

/**
 * Get all data from table student
 */
function selectAllStudents() {
    global $db;
    $result=$db->prepare("SELECT * from student");
    $result->execute();
    return $result;

}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    global $db;
    $stmt=$db->prepare("SELECT * FROM `student` WHERE id = :id;");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
  global $db;
  try{
    $delete=$db->prepare("DELETE FROM student WHERE id=:id;");
    $delete->bindParam(':id',$id);
    $delete->execute();
    
  }catch(PDOException $e){
    echo "Error:".$e->getMessage();
  }
}


/**
 * Update students
 * 
 */
function updateStudent($value) {
  global $db;
  try {
    $stmt=$db->prepare("UPDATE student SET name = :name, age=:age, email =:email, profile=:profile WHERE id = :id;");
    $stmt->bindParam(':id', $value['id']);
    $stmt->bindParam(':name', $value['name']);
    $stmt->bindParam(':age', $value['age']);
    $stmt->bindParam(':email', $value['email']);
    $stmt->bindParam(':profile', $value['profile']);

    $stmt->execute();

    echo "Student update successfully!";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  // return $stmt;
 

}
