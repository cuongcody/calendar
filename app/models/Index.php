<?php 


class Index extends Database {
    public $limit = 100;
    function __construct() {
        parent::__construct();
    }

    function all() {
        $sql = "SELECT * FROM work LIMIT $this->limit";
        $result = $this->db->query($sql);
        $works = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $work = [];
                $work['id'] = $row['id'];
                $work['title'] = $row['title'];
                $work['start'] = date('Y-m-d', $row['start_date']);
                $work['end'] = date('Y-m-d', $row['end_date']);
                $works[] = $work;
            }
            return $works;
        }
        return NULL;
    }

    function get($id) {
        $sql = "SELECT * FROM work WHERE id=$id LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
            $work['id'] = $row['id'];
            $work['title'] = $row['title'];
            $work['start_date'] = date('Y-m-d', $row['start_date']);
            $work['end_date'] = date('Y-m-d', $row['end_date']);
            return $work;
        }
        return $work;
    }
    function insert($data) {
        $sql = "INSERT INTO work (title, start_date, end_date)
        VALUES ('{$data['title']}', {$data['start_date']}, {$data['end_date']})";
        return $this->db->query($sql);
    }

    function update($id, $data) {
        $sql = "UPDATE work SET title='{$data['title']}', start_date= {$data['start_date']}, end_date= {$data['end_date']} WHERE id=$id";
        return $this->db->query($sql);
    }

    function delete($id) {
        // sql to delete a record
        $sql = "DELETE FROM work WHERE id=$id";
        return $this->db->query($sql);
    }
}
