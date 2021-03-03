<?php


namespace Certificate\Service;


use Certificate\Model\CertificateInterface;
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
    public function getAllCertificates(): array
    {
        return $this->certificateRepository->getAllCertificates();
    }

    public function getCertificate(string $id): CertificateInterface
    {
        return $this->certificateRepository->getCertificate($id);
    }
}