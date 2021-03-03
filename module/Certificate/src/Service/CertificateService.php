<?php


namespace Certificate\Service;


use Certificate\Repository\CertificateRepository;

class CertificateService
{
    /**
     * @var CertificateRepository
     */
    private $certificateRepository;

    public function __construct(CertificateRepository $certificateRepository)
    {
        $this->certificateRepository = $certificateRepository;
    }

    /**
     * @return array
     */
    public function getAllCertificates():array
    {
        return $this->certificateRepository->getAllCertificates();
    }
}