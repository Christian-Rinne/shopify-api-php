<?php

declare(strict_types=1);

namespace ShopifyTest\Rest;

use Shopify\Auth\Session;
use Shopify\Context;
use Shopify\Rest\Admin2021_10\Transaction;
use ShopifyTest\BaseTestCase;
use ShopifyTest\Clients\MockRequest;

final class Transaction202110Test extends BaseTestCase
{
    /** @var Session */
    private $test_session;

    public function setUp(): void
    {
        parent::setUp();

        Context::$API_VERSION = "2021-10";

        $this->test_session = new Session("session_id", "test-shop.myshopify.io", true, "1234");
        $this->test_session->setAccessToken("this_is_a_test_token");
    }

    /**

     *
     * @return void
     */
    public function test_1(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["transactions" => [["id" => 179259969, "order_id" => 450789469, "kind" => "refund", "gateway" => "bogus", "status" => "success", "message" => null, "created_at" => "2005-08-05T12:59:12-04:00", "test" => false, "authorization" => "authorization-key", "location_id" => null, "user_id" => null, "parent_id" => 801038806, "processed_at" => "2005-08-05T12:59:12-04:00", "device_id" => null, "error_code" => null, "source_name" => "web", "receipt" => [], "currency_exchange_adjustment" => null, "amount" => "209.00", "currency" => "USD", "admin_graphql_api_id" => "gid://shopify/OrderTransaction/179259969"], ["id" => 389404469, "order_id" => 450789469, "kind" => "authorization", "gateway" => "bogus", "status" => "success", "message" => null, "created_at" => "2005-08-01T11:57:11-04:00", "test" => false, "authorization" => "authorization-key", "location_id" => null, "user_id" => null, "parent_id" => null, "processed_at" => "2005-08-01T11:57:11-04:00", "device_id" => null, "error_code" => null, "source_name" => "web", "payment_details" => ["credit_card_bin" => null, "avs_result_code" => null, "cvv_result_code" => null, "credit_card_number" => "\u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 4242", "credit_card_company" => "Visa", "credit_card_name" => null, "credit_card_wallet" => null, "credit_card_expiration_month" => null, "credit_card_expiration_year" => null], "receipt" => ["testcase" => true, "authorization" => "123456"], "currency_exchange_adjustment" => null, "amount" => "598.94", "currency" => "USD", "admin_graphql_api_id" => "gid://shopify/OrderTransaction/389404469"], ["id" => 801038806, "order_id" => 450789469, "kind" => "capture", "gateway" => "bogus", "status" => "success", "message" => null, "created_at" => "2005-08-05T10:22:51-04:00", "test" => false, "authorization" => "authorization-key", "location_id" => null, "user_id" => null, "parent_id" => 389404469, "processed_at" => "2005-08-05T10:22:51-04:00", "device_id" => null, "error_code" => null, "source_name" => "web", "receipt" => [], "currency_exchange_adjustment" => null, "amount" => "250.94", "currency" => "USD", "admin_graphql_api_id" => "gid://shopify/OrderTransaction/801038806"]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/orders/450789469/transactions.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Transaction::all(
            $this->test_session,
            ["order_id" => "450789469"],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_2(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["transactions" => [["id" => 1068278469, "order_id" => 450789469, "kind" => "capture", "gateway" => "bogus", "status" => "success", "message" => "Bogus Gateway: Forced success", "created_at" => "2022-04-05T13:06:17-04:00", "test" => true, "authorization" => null, "location_id" => null, "user_id" => null, "parent_id" => 389404469, "processed_at" => "2022-04-05T13:06:17-04:00", "device_id" => null, "error_code" => null, "source_name" => "755357713", "payment_details" => ["credit_card_bin" => null, "avs_result_code" => null, "cvv_result_code" => null, "credit_card_number" => "\u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 4242", "credit_card_company" => "Visa", "credit_card_name" => null, "credit_card_wallet" => null, "credit_card_expiration_month" => null, "credit_card_expiration_year" => null], "receipt" => [], "currency_exchange_adjustment" => null, "amount" => "10.00", "currency" => "USD", "admin_graphql_api_id" => "gid://shopify/OrderTransaction/1068278469"]]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/orders/450789469/transactions.json?since_id=801038806",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Transaction::all(
            $this->test_session,
            ["order_id" => "450789469"],
            ["since_id" => "801038806"],
        );
    }

    /**

     *
     * @return void
     */
    public function test_3(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["transaction" => ["id" => 1068278470, "order_id" => 450789469, "kind" => "capture", "gateway" => "bogus", "status" => "success", "message" => "Bogus Gateway: Forced success", "created_at" => "2022-04-05T13:06:22-04:00", "test" => true, "authorization" => null, "location_id" => null, "user_id" => null, "parent_id" => 389404469, "processed_at" => "2022-04-05T13:06:22-04:00", "device_id" => null, "error_code" => null, "source_name" => "755357713", "payment_details" => ["credit_card_bin" => null, "avs_result_code" => null, "cvv_result_code" => null, "credit_card_number" => "\u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 4242", "credit_card_company" => "Visa", "credit_card_name" => null, "credit_card_wallet" => null, "credit_card_expiration_month" => null, "credit_card_expiration_year" => null], "receipt" => [], "currency_exchange_adjustment" => null, "amount" => "10.00", "currency" => "USD", "admin_graphql_api_id" => "gid://shopify/OrderTransaction/1068278470"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/orders/450789469/transactions.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["transaction" => ["currency" => "USD", "amount" => "10.00", "kind" => "capture", "parent_id" => 389404469]]),
            ),
        ]);

        $transaction = new Transaction($this->test_session);
        $transaction->order_id = 450789469;
        $transaction->currency = "USD";
        $transaction->amount = "10.00";
        $transaction->kind = "capture";
        $transaction->parent_id = 389404469;
        $transaction->save();
    }

    /**

     *
     * @return void
     */
    public function test_4(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["transaction" => ["id" => 1068278471, "order_id" => 450789469, "kind" => "void", "gateway" => "bogus", "status" => "success", "message" => "Bogus Gateway: Forced success", "created_at" => "2022-04-05T13:06:23-04:00", "test" => true, "authorization" => null, "location_id" => null, "user_id" => null, "parent_id" => 389404469, "processed_at" => "2022-04-05T13:06:23-04:00", "device_id" => null, "error_code" => null, "source_name" => "755357713", "payment_details" => ["credit_card_bin" => null, "avs_result_code" => null, "cvv_result_code" => null, "credit_card_number" => "\u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 4242", "credit_card_company" => "Visa", "credit_card_name" => null, "credit_card_wallet" => null, "credit_card_expiration_month" => null, "credit_card_expiration_year" => null], "receipt" => [], "currency_exchange_adjustment" => null, "amount" => "0.00", "currency" => "USD", "admin_graphql_api_id" => "gid://shopify/OrderTransaction/1068278471"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/orders/450789469/transactions.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["transaction" => ["currency" => "USD", "amount" => "10.00", "kind" => "void", "parent_id" => 389404469]]),
            ),
        ]);

        $transaction = new Transaction($this->test_session);
        $transaction->order_id = 450789469;
        $transaction->currency = "USD";
        $transaction->amount = "10.00";
        $transaction->kind = "void";
        $transaction->parent_id = 389404469;
        $transaction->save();
    }

    /**

     *
     * @return void
     */
    public function test_5(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["transaction" => ["id" => 1068278472, "order_id" => 450789469, "kind" => "capture", "gateway" => "bogus", "status" => "success", "message" => "Bogus Gateway: Forced success", "created_at" => "2022-04-05T13:06:25-04:00", "test" => true, "authorization" => null, "location_id" => null, "user_id" => null, "parent_id" => 389404469, "processed_at" => "2022-04-05T13:06:25-04:00", "device_id" => null, "error_code" => null, "source_name" => "755357713", "payment_details" => ["credit_card_bin" => null, "avs_result_code" => null, "cvv_result_code" => null, "credit_card_number" => "\u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 4242", "credit_card_company" => "Visa", "credit_card_name" => null, "credit_card_wallet" => null, "credit_card_expiration_month" => null, "credit_card_expiration_year" => null], "receipt" => [], "currency_exchange_adjustment" => null, "amount" => "10.00", "currency" => "USD", "admin_graphql_api_id" => "gid://shopify/OrderTransaction/1068278472"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/orders/450789469/transactions.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["transaction" => ["currency" => "USD", "amount" => "10.00", "kind" => "capture", "parent_id" => 389404469, "test" => true]]),
            ),
        ]);

        $transaction = new Transaction($this->test_session);
        $transaction->order_id = 450789469;
        $transaction->currency = "USD";
        $transaction->amount = "10.00";
        $transaction->kind = "capture";
        $transaction->parent_id = 389404469;
        $transaction->test = true;
        $transaction->save();
    }

    /**

     *
     * @return void
     */
    public function test_6(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["transaction" => ["id" => 1068278473, "order_id" => 450789469, "kind" => "capture", "gateway" => "bogus", "status" => "success", "message" => "Bogus Gateway: Forced success", "created_at" => "2022-04-05T13:06:27-04:00", "test" => true, "authorization" => null, "location_id" => null, "user_id" => null, "parent_id" => 389404469, "processed_at" => "2022-04-05T13:06:27-04:00", "device_id" => null, "error_code" => null, "source_name" => "755357713", "payment_details" => ["credit_card_bin" => null, "avs_result_code" => null, "cvv_result_code" => null, "credit_card_number" => "\u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 4242", "credit_card_company" => "Visa", "credit_card_name" => null, "credit_card_wallet" => null, "credit_card_expiration_month" => null, "credit_card_expiration_year" => null], "receipt" => [], "currency_exchange_adjustment" => null, "amount" => "598.94", "currency" => "USD", "admin_graphql_api_id" => "gid://shopify/OrderTransaction/1068278473"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/orders/450789469/transactions.json",
                "POST",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
                json_encode(["transaction" => ["kind" => "capture", "authorization" => "authorization-key"]]),
            ),
        ]);

        $transaction = new Transaction($this->test_session);
        $transaction->order_id = 450789469;
        $transaction->kind = "capture";
        $transaction->authorization = "authorization-key";
        $transaction->save();
    }

    /**

     *
     * @return void
     */
    public function test_7(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["count" => 3]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/orders/450789469/transactions/count.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Transaction::count(
            $this->test_session,
            ["order_id" => "450789469"],
            [],
        );
    }

    /**

     *
     * @return void
     */
    public function test_8(): void
    {
        $this->mockTransportRequests([
            new MockRequest(
                $this->buildMockHttpResponse(200, json_encode(
                  ["transaction" => ["id" => 389404469, "order_id" => 450789469, "kind" => "authorization", "gateway" => "bogus", "status" => "success", "message" => null, "created_at" => "2005-08-01T11:57:11-04:00", "test" => false, "authorization" => "authorization-key", "location_id" => null, "user_id" => null, "parent_id" => null, "processed_at" => "2005-08-01T11:57:11-04:00", "device_id" => null, "error_code" => null, "source_name" => "web", "payment_details" => ["credit_card_bin" => null, "avs_result_code" => null, "cvv_result_code" => null, "credit_card_number" => "\u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 4242", "credit_card_company" => "Visa"], "receipt" => ["testcase" => true, "authorization" => "123456"], "currency_exchange_adjustment" => null, "amount" => "598.94", "currency" => "USD", "authorization_expires_at" => null, "extended_authorization_attributes" => [], "admin_graphql_api_id" => "gid://shopify/OrderTransaction/389404469"]]
                )),
                "https://test-shop.myshopify.io/admin/api/2021-10/orders/450789469/transactions/389404469.json",
                "GET",
                null,
                [
                    "X-Shopify-Access-Token: this_is_a_test_token",
                ],
            ),
        ]);

        Transaction::find(
            $this->test_session,
            389404469,
            ["order_id" => "450789469"],
            [],
        );
    }

}