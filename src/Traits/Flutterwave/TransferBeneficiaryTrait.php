<?php

namespace MusahMusah\LaravelMultipaymentGateways\Traits\Flutterwave;

trait TransferBeneficiaryTrait
{
    const BENEFICIARY_ENDPOINT = '/beneficiaries/';

    /**
     * Create a Transfer Beneficiary
     *
     * This method allows you to create beneficiaries for Transfers.
     *
     * @param  array  $transferBeneficiaryDetails
     * @return mixed
     */
    public function createTransferBeneficiary(array $transferBeneficiaryDetails)
    {
        $endpoint = $this->baseUri.self::BENEFICIARY_ENDPOINT;

        $transferBeneficiary = $this->makeRequest(
            method: 'POST',
            requestUrl: $endpoint,
            formParams: $transferBeneficiaryDetails,
            isJsonRequest: true
        );

        return $transferBeneficiary;
    }

    /**
     * List all Transfer Beneficiaries
     *
     * This function retrieves all transfer beneficiaries on the account
     *
     * @param  array  $queryParams [optional]
     * @return array
     */
    public function getAllTransferBeneficiaries($queryParams = []): array
    {
        $endpoint = $this->baseUri.self::BENEFICIARY_ENDPOINT;

        $transferBeneficiary = $this->makeRequest(
            method: 'GET',
            requestUrl: $endpoint,
            queryParams: $queryParams,
            isJsonRequest: true
        );

        return $transferBeneficiary;
    }

    /**
     * Fetch a Transfer Beneficiary
     *
     * This method allows you to retrieve a single transfer beneficiary.
     *
     * @param  int  $beneficiaryId
     * @return array
     */
    public function getTransferBeneficiary(int $beneficiaryId)
    {
        $endpoint = $this->baseUri.self::BENEFICIARY_ENDPOINT.$beneficiaryId;

        $transferBeneficiary = $this->makeRequest(
            method: 'GET',
            requestUrl: $endpoint,
            isJsonRequest: true
        );

        return $transferBeneficiary;
    }

    /**
     * Delete a Transfer Beneficiary
     *
     * This endpoint allows you to delete a transfer beneficiary
     *
     * @param  int  $beneficiaryId
     * @return array
     */
    public function deleteTransferBeneficiary(int $beneficiaryId)
    {
        $endpoint = $this->baseUri.self::BENEFICIARY_ENDPOINT.$beneficiaryId;

        $response = $this->makeRequest(
            method: 'DELETE',
            requestUrl: $endpoint,
            isJsonRequest: true
        );

        return $response;
    }
}
