<?php

namespace App\controllers;

use App\models\CaracteristiqueService;
use App\models\CategorieService;
use App\models\Keyword;
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

    /** @var Keyword  */
    private $keywordService;

    /**
     * PathologyController constructor.
     */
    public function __construct()
    {
        $this->pathologyService = $GLOBALS['pathology_service'];
        $this->meridienService = $GLOBALS['meridien_service'];
        $this->caracteristiqueService = $GLOBALS['carac_service'];
        $this->categorieService = $GLOBALS['cat_service'];
        $this->keywordService = $GLOBALS['key_service'];
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function index(Request $request, Response $response): Response
    {
        try {
            $this->initFiltersVariables();

            $template = $GLOBALS['smarty']->fetch('pathology.tpl');
            $response->getBody()->write($template);

            return $response;
        } catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function filter(Request $request, Response $response): Response
    {
        try {
            $this->initFiltersVariables();

            $mer = $_POST['meridien'];
            $cat = $_POST['category'];
            $carac = $_POST['carac'];

            $pathologies = $this->pathologyService->getFilteredPathologies($mer, $cat, $carac);
            $GLOBALS['smarty']->assign('pathologies', $pathologies);

            $template = $GLOBALS['smarty']->fetch('pathology.tpl');
            $response->getBody()->write($template);

            return $response;
        } catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function keywordFilter(Request $request, Response $response): Response
    {
        try {
            $this->initFiltersVariables();

            $keyword = $_POST['keyword'];

            $pathologies = $this->pathologyService->getFilteredPathologiesByKeyword($keyword);
            $GLOBALS['smarty']->assign('pathologies', $pathologies);

            $template = $GLOBALS['smarty']->fetch('pathology.tpl');
            $response->getBody()->write($template);

            return $response;
        } catch (\Exception $e) {
            return $response->withStatus(500, $e->getMessage());
        }
    }

    private function initFiltersVariables(): void
    {
        $headers = Pathology::HEADERS;
        $meridiens = $this->meridienService->getAll();
        $categories = $this->categorieService->getAll();
        $caracs = $this->caracteristiqueService->getAll();
        $keywords = $this->keywordService->getAll();

        $GLOBALS['smarty']->assign('meridiens', $meridiens);
        $GLOBALS['smarty']->assign('categories', $categories);
        $GLOBALS['smarty']->assign('caracs', $caracs);
        $GLOBALS['smarty']->assign('keywords', $keywords);
        $GLOBALS['smarty']->assign('headers', $headers);
    }
}
