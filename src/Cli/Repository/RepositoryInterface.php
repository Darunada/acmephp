<?php

/*
 * This file is part of the Acme PHP project.
 *
 * (c) Titouan Galopin <galopintitouan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AcmePhp\Cli\Repository;

use AcmePhp\Cli\Exception\AcmeCliException;
use AcmePhp\Ssl\Certificate;
use AcmePhp\Ssl\CertificateResponse;
use AcmePhp\Ssl\DistinguishedName;
use AcmePhp\Ssl\KeyPair;

/**
 * @author Titouan Galopin <galopintitouan@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * Extract important elements from the given certificate response and store them
     * in the repository.
     *
     * This method will use the distinguished name common name as a domain to store:
     *      - the key pair
     *      - the certificate request
     *      - the certificate
     *
     * @param CertificateResponse $certificateResponse
     *
     * @throws AcmeCliException
     *
     * @return void
     */
    public function storeCertificateResponse(CertificateResponse $certificateResponse);

    /**
     * Store a given key pair as the account key pair (the global key pair used to
     * interact with the ACME server).
     *
     * @param KeyPair $keyPair
     *
     * @throws AcmeCliException
     *
     * @return void
     */
    public function storeAccountKeyPair(KeyPair $keyPair);

    /**
     * Check if there is an account key pair in the repository.
     *
     * @return bool
     */
    public function hasAccountKeyPair();

    /**
     * Load the account key pair.
     *
     * @throws AcmeCliException
     *
     * @return KeyPair
     */
    public function loadAccountKeyPair();

    /**
     * Store a given key pair as associated to a given domain.
     *
     * @param string  $domain
     * @param KeyPair $keyPair
     *
     * @throws AcmeCliException
     *
     * @return void
     */
    public function storeDomainKeyPair($domain, KeyPair $keyPair);

    /**
     * Check if there is a key pair associated to the given domain in the repository.
     *
     * @param string $domain
     *
     * @return bool
     */
    public function hasDomainKeyPair($domain);

    /**
     * Load the key pair associated to a given domain.
     *
     * @param string $domain
     *
     * @throws AcmeCliException
     *
     * @return KeyPair
     */
    public function loadDomainKeyPair($domain);

    /**
     * Store a given distinguished name as associated to a given domain.
     *
     * @param string            $domain
     * @param DistinguishedName $distinguishedName
     *
     * @throws AcmeCliException
     *
     * @return void
     */
    public function storeDomainDistinguishedName($domain, DistinguishedName $distinguishedName);

    /**
     * Check if there is a distinguished name associated to the given domain in the repository.
     *
     * @param string $domain
     *
     * @return bool
     */
    public function hasDomainDistinguishedName($domain);

    /**
     * Load the distinguished name associated to a given domain.
     *
     * @param string $domain
     *
     * @throws AcmeCliException
     *
     * @return DistinguishedName
     */
    public function loadDomainDistinguishedName($domain);

    /**
     * Store a given certificate as associated to a given domain.
     *
     * @param string      $domain
     * @param Certificate $certificate
     *
     * @throws AcmeCliException
     *
     * @return void
     */
    public function storeDomainCertificate($domain, Certificate $certificate);

    /**
     * Check if there is a certificate associated to the given domain in the repository.
     *
     * @param string $domain
     *
     * @return bool
     */
    public function hasDomainCertificate($domain);

    /**
     * Load the certificate associated to a given domain.
     *
     * @param string $domain
     *
     * @throws AcmeCliException
     *
     * @return Certificate
     */
    public function loadDomainCertificate($domain);
}
