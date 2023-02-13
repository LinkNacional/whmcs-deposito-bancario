<?php

use Smarty;

if (!defined('WHMCS')) {
    die;
}

/**
 * @return array
 */
function lkn_deposito_bancario_MetaData()
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
function lkn_deposito_bancario_config()
{
    return [
        'FriendlyName' => [
            'Type' => 'System',
            'Value' => 'Depósito Bancário',
        ],

        'cnpj' => [
            'FriendlyName' => 'CNPJ',
            'Description' => '',
            'Type' => 'text',
            'Size' => '25',
        ],

        'bank' => [
            'FriendlyName' => 'Banco',
            'Description' => '',
            'Type' => 'text',
            'Size' => '25',
        ],

        'holder' => [
            'FriendlyName' => 'Favorecido',
            'Description' => '',
            'Type' => 'text',
            'Size' => '25',
        ],

        'agency_number' => [
            'FriendlyName' => 'Agência',
            'Description' => '',
            'Type' => 'text',
            'Size' => '25',
        ],

        'account_number' => [
            'FriendlyName' => 'Conta',
            'Description' => '',
            'Type' => 'text',
            'Size' => '25',
        ],

        'footnote' => [
            'FriendlyName' => 'Observação',
            'Description' => '',
            'Type' => 'text',
            'Size' => '255',
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
function lkn_deposito_bancario_link($params)
{
    $gatewayName = $params['name'];
    $cnpj = $params['cnpj'] ?? '';
    $bank = $params['bank'] ?? '';
    $holder = $params['holder'] ?? '';
    $agencyNumber = $params['agency_number'] ?? '';
    $accountNumber = $params['account_number'] ?? '';
    $accountNumber = $params['account_number'] ?? '';
    $footnote = $params['footnote'] ?? '';

    $smarty = new Smarty();
    $smarty->assign('gatewayName', $gatewayName);
    $smarty->assign('cnpj', $cnpj);
    $smarty->assign('bank', $bank);
    $smarty->assign('holder', $holder);
    $smarty->assign('agencyNumber', $agencyNumber);
    $smarty->assign('accountNumber', $accountNumber);
    $smarty->assign('footnote', $footnote);

    return $smarty->fetch(__DIR__ . '/lkn_deposito_bancario/templates/deposit_data_display.tpl');
}
