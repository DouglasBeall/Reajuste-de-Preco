let span = document.getElementById('descontoSpan');
let input = document.getElementById('numDesconto');

mudaValor();


function mudaValor() {
    span.innerText = input.value;
}