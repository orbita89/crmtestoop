<?php
require_once 'app/models/pages/PageModel.php';

class PageController{

    public function index(){
        $pageModel = new PageModel();
        $pages = $pageModel->getAllPages();

        include 'app/views/pages/index.php';
    }

    public function create(){
        include 'app/views/pages/create.php';
    }

    public function store(){
        if(isset($_POST['title']) && isset($_POST['slug'])){
            $title = trim($_POST['title']);
            $slug = trim($_POST['slug']);

            if (empty($title) || empty($slug)) {
                echo "Поля Title и Slug обязательны!";
                return;
            }

            $pageModel = new PageModel();
            $pageModel->createPage($title, $slug);
        }
        header("Location: index.php?page=pages");
    }

    public function edit($id){
        $pageModel = new PageModel();
        $page = $pageModel->getPageById($id);

        if(!$page){
            echo "Страница не найдена";
            return;
        }

        include 'app/views/pages/edit.php';
    }

    public function update(){
        if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['slug'])){
            $id = trim($_POST['id']);
            $title = trim($_POST['title']);
            $slug = trim($_POST['slug']);

            if (empty($title) || empty($slug)) {
                echo "Поля Title и Slug обязательны!";
                return;
            }

            $pageModel = new PageModel();
            $pageModel->updatePage($id, $title, $slug);
        }
        header("Location: index.php?page=pages");
    }

    public function delete(){
        $pageModel = new PageModel();
        $pageModel->deletePage($_GET['id']);

        header('Location: index.php?page=pages');
    }
}