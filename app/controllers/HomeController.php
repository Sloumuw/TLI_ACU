<?php

namespace App\Controllers;

use Smarty;
use App\Models\UserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    /** @var Smarty */
    private $smarty;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->smarty = $smarty = new Smarty();
        $smarty->setTemplateDir('../templates');
        $smarty->setCompileDir('../templates_c');
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response): Response
    {
        $x = new UserService();

        $query = $x->db->conn->prepare("SELECT * FROM meridien");
        $query->execute();
        $result = $query->fetchAll();
//        $stmt = $x->db->conn->prepare("SELECT * FROM meridien;");
//        $stmt = $stmt->execute();
//        var_dump($stmt);die;

        // set the resulting array to associative
//        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
//            echo $v;
//        }

        echo "<pre>";
        var_dump($result);die;

//        try {
//            $this->smarty->assign('name', 'World');
//            $template = $this->smarty->fetch('base.tpl');
//            $response->getBody()->write($template);
//
//            return $response;
//        }catch (\Exception $e) {
//            return $response->withStatus(500, $e->getMessage());
//        }
    }
}
