<?php

namespace MusahMusah\LaravelMultipaymentGateways\Traits\Flutterwave;

use GuzzleHttp\Exception\GuzzleException;
use MusahMusah\LaravelMultipaymentGateways\Constants\FlutterwaveConstant;
use MusahMusah\LaravelMultipaymentGateways\Exceptions\HttpMethodFoundException;

trait PaymentPlanTrait
{
    /**
     * Create Payment Plan
     *
     * This method helps you create a payment plan
     *
     * @param  array  $planDetails The details of the plan.
     *
     * @throws GuzzleException|HttpMethodFoundException
     */
    public function createPaymentPlan(array $planDetails): array
    {
        return flutterwave()->httpClient()->post(
            url: FlutterwaveConstant::PAYMENT_PLAN_ENDPOINT,
            formParams: $planDetails,
            isJsonRequest: true
        );
    }

    /**
     * Update Payment Plan
     *
     * This method allows you update a payment plan
     *
     * @param  int  $paymentPlanId The ID of the payment plan to update.
     * @param  array  $planDetails The updated details of the plan.
     *
     * @throws GuzzleException|HttpMethodFoundException
     */
    public function updatePaymentPlan(int $paymentPlanId, array $planDetails): array
    {
        return flutterwave()->httpClient()->put(
            url: FlutterwaveConstant::PAYMENT_PLAN_ENDPOINT.$paymentPlanId,
            formParams: $planDetails,
            isJsonRequest: true
        );
    }

    /**
     * Get all payment plans
     *
     * This method retrieves all payment plans on the account
     *
     * @param  array  $queryParams [optional] The query parameters array.
     *
     * @throws GuzzleException|HttpMethodFoundException
     */
    public function getAllPaymentPlans(array $queryParams = []): array
    {
        return flutterwave()->httpClient()->get(
            url: FlutterwaveConstant::PAYMENT_PLAN_ENDPOINT,
            query: $queryParams
        );
    }

    /**
     * Get a Payment Plan
     *
     * This method allows you to retrieve a single payment plan based on its ID.
     *
     * @param  int  $paymentPlanId The ID of the payment plan to retrieve.
     *
     * @throws GuzzleException|HttpMethodFoundException
     */
    public function getPaymentPlan(int $paymentPlanId): array
    {
        return flutterwave()->httpClient()->get(
            url: FlutterwaveConstant::PAYMENT_PLAN_ENDPOINT.$paymentPlanId,
        );
    }

    /**
     * Cancel a Payment Plan
     *
     * This method allows the merchant/developer cancel an existing payment plan.
     *
     * @param  int  $paymentPlanId - The unique ID of the payment plan you want to cancel
     *
     * @throws GuzzleException|HttpMethodFoundException
     */
    public function cancelPaymentPlan(int $paymentPlanId): array
    {
        return flutterwave()->httpClient()->put(
            url: FlutterwaveConstant::PAYMENT_PLAN_ENDPOINT.$paymentPlanId.'/cancel',
        );
    }
}
