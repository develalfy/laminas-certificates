<?php


namespace Certificate\Service;


use Certificate\Repository\CertificateRepositoryInterface;

class CertificateService
{
    /**
     * @var CertificateRepositoryInterface
     */
    private $certificateRepository;

    public function __construct(CertificateRepositoryInterface $certificateRepository)
    {
        $this->certificateRepository = $certificateRepository;
    }

    /**
     * @return array
     */
    public function getAllCertificates():array
    {
        //todo: business logic goes here
        return $this->certificateRepository->getAllCertificates();
    }
}