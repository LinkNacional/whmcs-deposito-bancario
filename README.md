# whmcs-cielo-credit-card

Este repositório é a junção de dois tipos de gateway para WHMCS:
1. lknc_cielo_credit_card_token: [Merchant Gateway](https://developers.whmcs.com/payment-gateways/merchant-gateway/)
Este gateway possibilita a captura da fatura diretamente no painel de administrador, ou pelo Caixa do cliente.

2. lknc_cielo_credit_card: [Third Party Gateway](https://developers.whmcs.com/payment-gateways/third-party-gateway/)
Este gateway exibe um formulário para pagamento inserindo o número do cartão e outras informações (pagamento normal) ou selecionar um cartão tokenizado já salvo pelo cliente.  Este gateway também permite ao cliente salvar o cartão com as informações digitadas, caso o usuário selecione a opção para salvar o cartão.

# Modo de instalação
1. Baixe o arquivo do módulo na área do cliente da Link Nacional.
2. Extraia o .zip na sua máquina.
3. Envie a pasta extraída para a raiz da instalação do WHMCS.
4. No seu WHMCS, vá até a página de configurações do gateway.
5. Insira a licença da Link Nacional, a Merchant Key, a Merchant ID nas configurações do gateway.
6. Ainda nas configurações, escolha quais funcionalidades deseja utilizar.
7. Clique no botão salvar.
# Modo de uso
1. Acesse uma fatura, na tela de pagamento.
2. Selecione o modulo de cartão de crédito como forma de pagamento.
3. Observe o formulário de pagamento do modulo.
4. Tente realizar um pagamento.
# Configuração para testes
1. Troque as chaves Merchant Key e Merchant ID para as suas chaves de sandbox da Cielo.
2. Ative a configuração "Ativar o modo teste".
3. Ative a configuração "Ativar log do gateway" para obter mais detalhes sobre as operações do módulo.
# Ao lançar nova versão
1. Inserir alterações no changelog
# Personalização
## Sobrea a tokenização dos cartões

O gateway _lknc_cielo_credit_card_, utiliza uma função adaptada para salvar o cartão tokenizado no perfil do cliente. Ao fazer isso, o cartão é registrado como se tivesse sido tokenizado pelo módulo _lknc_cielo_credit_card_token_.
Assim, o módulo _lknc_cielo_credit_card_token_ consegue utilizar os cartões salvos.

## Adicionar parcelamento da fatura no pagamento dentro do Caixa (área do cliente).
1. Abra o arquivo `invoice-payment.tpl` correspondente ao seu tema. Ex.: ```/templates/twenty-one/invoice-payment.tpl```.

1. Encontre o seguinte trecho de código:
```php
{if !$hasRemoteInput}
  {include file="$template/payment/$cardOrBank/inputs.tpl"}
{/if}
```
3. Depos, copie e cole o código abaixo depois do trecho de código acima:
```php
{$lknc_invoice_installment}
```
4. Por fim, confirme as alterações, salve o arquivo e envie-o para o seu WHMCS.

## Adicionar aviso sobre outro gateway com mais opções para o pagamento
1. Abra o arquivo `invoice-payment.tpl` correspondente ao seu tema. Ex.: ```/templates/twenty-one/invoice-payment.tpl```.

2. Se você inseriu o código para parcelamento, inseria o seguinte trecho após ele:
```php
{$lknc_more_payment_options}
```
3. Caso contrário, insira depois do seguinte trecho de código:
```php
{if !$hasRemoteInput}
  {include file="$template/payment/$cardOrBank/inputs.tpl"}
{/if}
```

## Remover gateway de token como forma de pagamento da fatura
1. Abra o arquivo `viewinvoice.tpl` correspondente ao seu tema. Ex.: `/template/templates/twenty-one/viewinvoice.tpl`.
2. Na linha que contém o código `{foreach $availableGateways as $gatewayModule => $gatewayName}`, apague o conteúdo do dentro do  bloco `foreach` e cole o bloco de código abaixo:
```php
{if $gatewayModule !== 'lknc_cielo_credit_card_token'}
  <option
    value="{$gatewayModule}"
    {if $gatewayModule == $selectedGateway}
      selected="selected"
    {/if}
  >{$gatewayName}</option>
{/if}
```

## Preenchimento do arquivo JSON de taxas

- Substituir o nome "bandeira" pelo nome da bandeira de cartão a qual se deseja aplicar as taxas. O nome deve conter apenas letras e não deve apresentar espaços.
- Inserir a porcentagem da taxa depois do ponto em vírgula e antes da vírgula.
- Os valores das taxas podem ser de 0 a 100.
- Utilizar ponto para porcentagens com casas decimais.


```JSON
"bandeira": {
  "debito": 1.2,
  "credito": {
    "1": 1.2,
    "2": 1.2,
    "3": 1.2,
    "4": 1.2,
    "5": 1.2,
    "6": 1.2,
    "7": 1.2,
    "8": 1.2,
    "9": 1.2,
    "10": 1.2,
    "11": 1.2,
    "12": 1.2,
  }
},
```
O bloco do JSON chamado "outras" contém as taxas aplicadas às bandeiras que não têm seu próprio bloco.
```json
"outras": {
  "debito": 0,
  "credito": {
    "1": 0,
    "2": 0,
    "3": 0,
    "4": 0,
    "5": 0,
    "6": 0,
    "7": 0,
    "8": 0,
    "9": 0,
    "10": 0,
    "11": 0,
    "12": 0
  }
},
´``
