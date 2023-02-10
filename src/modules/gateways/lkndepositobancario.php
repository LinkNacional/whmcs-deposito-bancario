<?php

if (!defined('WHMCS')) {
    die;
}

/**
 * @return array
 */
function lkndepositobancario_MetaData()
{
    return [
        'DisplayName' => 'Depósito Bancário',
        'APIVersion' => '1.1', // Use API Version 1.1
        'DisableLocalCreditCardInput' => true,
        'TokenisedStorage' => false,
    ];
}

/**
 * @return array
 */
function lkndepositobancario_config()
{
    return [
        'FriendlyName' => [
            'Type' => 'System',
            'Value' => 'Depósito Bancário',
        ]
    ];
}

/**
 * @see https://developers.whmcs.com/payment-gateways/third-party-gateway/
 *
 * @param array $params Payment Gateway Module Parameters
 *
 * @return string
 */
function gatewaymodule_link($params)
{
    return <<<HTML
HTML;
}
