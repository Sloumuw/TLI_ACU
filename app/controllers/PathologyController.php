<?php

namespace App\controllers;

use App\models\CaracteristiqueService;
use App\models\CategorieService;
use App\models\MeridienService;
use App\models\Pathology;
use App\models\PathologyService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PathologyController
{
    /** @var PathologyService */
    private $pathologyService;

    /** @var MeridienService */
    private $meridienService;

    /** @var CaracteristiqueService */
    private $caracteristiqueService;

    /** @var CategorieService */
    private $categorieService;

    /**
     * PathologyController constructor.
     */
    public function __construct()
    {
        $this->pathologyService = $GLOBALS['pathology_service'];
        $this->meridienService = $GLOBALS['meridien_service'];
        $this->caracteristiqueService = $GLOBALS['carac_service'];
        $this->categorieService = $GLOBALS['cat_service'];
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response): Response
    {
        try {
            $headers = Pathology::HEADERS;
            $pathologies = $this->pathologyService->getAll();

            $meridiens = $this->meridienService->getAll();
            $categories = $this->categorieService->getAll();
            $caracs = $this->caracteristiqueService->getAll();

            $GLOBALS['smarty']->assign('pathologies', $pathologies);
            $GLOBALS['smarty']->assign('headers', $headers);
            $GLOBALS['smarty']->assign('meridiens', $meridiens);
            $GLOBALS['smarty']->assign('categories', $categories);
            $GLOBALS['smarty']->assign('caracs', $caracs);

            $template = $GLOBALS['smarty']->fetch('pathology.tpl');
            $response->getBody()->write($template);

            return $response;
        } catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }
    }
}
