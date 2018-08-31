<?php

class Home extends Controller{

    public function index(){
        $this->view('home/index', ['title' => 'Home page' ]);
    }

    public function all_ajax(){
        header('Content-Type: application/json');
        $index = $this->model('Index');
        $works = $index->all();
        echo json_encode(['status_code' => 200, 'works' => $works ]);
    }

    public function add() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            if (empty($data['title']) || empty($data['start_date']) || empty($data['end_date']) || strtotime($data['end_date']) < strtotime($data['start_date'])) {
                $this->view('home/details', ['title' => 'Add', 'message' => "Wrong input" ]);
            }
            else {
                $work['start_date'] = strtotime($data['start_date']);
                $work['end_date'] = strtotime($data['end_date']);
                $work['title'] = $data['title'];

                $index = $this->model('Index');
                $result = $index->insert($work);
                return $result ? $this->view('home/details', ['title' => 'Add', 'message' => 'Success' ]) : $this->view('home/details', ['title' => 'Add', 'message' => "Error" ]);

            }
        }
        else {
            $this->view('home/details', ['title' => 'Add' ]);
        }
    }

    public function edit($id) {
        $index = $this->model('Index');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $work = $index->get($id);
            if (empty($data['title']) || empty($data['start_date']) || empty($data['end_date']) || strtotime($data['end_date']) < strtotime($data['start_date'])) {
                $this->view('home/update', ['title' => 'Update', 'work' => $work, 'message' => "Wrong input" ]);
            }
            else {
                $work['start_date'] = strtotime($data['start_date']);
                $work['end_date'] = strtotime($data['end_date']);
                $work['title'] = $data['title'];
                $result = $index->update($id, $work);
                return $result ? $this->view('home/index', ['title' => 'Home page', 'message' => 'Update successfully' ]) : $this->view('home/update', ['title' => 'Update', 'work' => $work, 'message' => "Error" ]);

            }
        }
        else {
            $work = $index->get($id);
            return $work ? $this->view('home/update', ['title' => 'Update', 'work' => $work ]) : $this->view('home/details', ['title' => 'Add' ]);
        }
    }

    public function delete_ajax(){
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $index = $this->model('Index');
            $result = $index->delete($data['id']);
            if ($result) echo json_encode(['status_code' => 200, 'message' => "Success" ]);
            else echo json_encode(['status_code' => 500, 'message' => "Error" ]);
        }

    }
}
