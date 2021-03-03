<?php

namespace Certificate\Repository;

interface CertificateRepositoryInterface
{
    public function getAllCertificates():array;

    public function getCertificate(string $id);
}