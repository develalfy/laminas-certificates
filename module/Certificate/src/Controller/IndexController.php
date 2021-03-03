<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Certificate\Controller;

use Certificate\Service\CertificateService;
use Certificate\Service\RendererService;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    /**
     * @var CertificateService
     */
    private $certificateService;
    /**
     * @var RendererService
     */
    private $rendererService;

    public function __construct(CertificateService $certificateService, RendererService $rendererService)
    {
        $this->certificateService = $certificateService;
        $this->rendererService = $rendererService;
    }

    public function indexAction()
    {
        $certificates = $this->certificateService->getAllCertificates();

        return new ViewModel(['certificates' => $certificates]);
    }

    public function displayAsHtmlAction()
    {
        $id = $this->params()->fromRoute('isin');

        try {
            $certificate = $this->certificateService->getCertificate($id);
        } catch (\TypeError $e) {
            return $this->redirect()->toRoute('certificate');
        }

        return $this->rendererService->displayAsHtml($certificate);
    }

    public function displayAsXmlAction()
    {
        $id = $this->params()->fromRoute('isin');

        try {
            $certificate = $this->certificateService->getCertificate($id);
        } catch (\TypeError $e) {
            return $this->redirect()->toRoute('certificate');
        }

        return $this->rendererService->displayAsXml($certificate);
    }
}
