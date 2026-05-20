<?php
include'Database.php';

class Disease {

    private $conn;
    private $table = "tbl_disease";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // CREATE
    public function create($cow_id, $d_name, $symptoms, $diag_date, $treatment, $store_date) {

        $sql = "INSERT INTO $this->table
        (Cow_ID, D_Name, Symptoms, Diagnosis_Date, Treatment, Store_date)
        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "isssss",
            $cow_id,
            $d_name,
            $symptoms,
            $diag_date,
            $treatment,
            $store_date
        );

        return $stmt->execute();
    }

    // READ
    public function read() {

        $sql = "SELECT * FROM $this->table";
        return $this->conn->query($sql);
    }

    // GET SINGLE RECORD
    public function getById($id) {

        $sql = "SELECT * FROM $this->table WHERE Cow_ID = ?";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE
    public function update($id, $d_name, $symptoms, $diag_date, $treatment, $store_date) {

        $sql = "UPDATE $this->table SET
        D_Name=?,
        Symptoms=?,
        Diagnosis_Date=?,
        Treatment=?,
        Store_date=?
        WHERE Cow_ID=?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "sssssi",
            $d_name,
            $symptoms,
            $diag_date,
            $treatment,
            $store_date,
            $id
        );

        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {

        $sql = "DELETE FROM $this->table WHERE Cow_ID=?";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
?>