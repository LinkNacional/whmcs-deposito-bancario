<div>
    <p class="h5 text-left mb-3 mt-4 mt-md-0">{$gatewayName}</p>

    <ul class="list-unstyled text-left">
        <li>CNPJ: {$cnpj}</li>
        <li>Favorecido: {$holder}</li>
        <li>Banco: {$bank}</li>
        <li>Agência: {$agencyNumber}</li>
        <li>Conta: {$accountNumber}</li>
    </ul>

    <p class="small text-left">{$footnote}</p>
</div>

<script type="text/javascript">
    // Hiddes pay button.
    document.querySelector('form[name="paymentfrm"] button').style.display = 'none'
</script>
