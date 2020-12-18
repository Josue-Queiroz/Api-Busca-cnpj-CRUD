/*API ReveitasWS CNPJ -> https://gist.github.com/Guichaguri/e6b1c41b56e9b2787074fcc8e9602c6d*/
/*API Cep https://viacep.com.br/ws/*/


var maskCpfOuCnpj = IMask(document.getElementById('cnpj'), {
    mask:[
        {
            mask: '00.000.000/0000-00',
            maxLength: 18
        }
    ]
});
var maskCpfOuCnpj = IMask(document.getElementById('cep'), {
    mask:[
        {
            mask: '00000-000',
            maxLength:9
        }
    ]
});
var maskCpfOuCnpj = IMask(document.getElementById('phone'), {
    mask:[
        {
            mask: '(00) 0000-0000',
            maxLength:14
        },
        {
            mask: '(00) 00000-0000',
            maxLength:15
        }
    ]
});
var maskCpfOuCnpj = IMask(document.getElementById('search'), {
    mask:[
        {
            mask: '00.000.000/0000-00',
            maxLength: 18
        }
    ]
});

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        $("#modal-cep").modal();
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};

/*--------------------------------------------------------------------------------------------*/

function pesquisacnpj(cnpj) {
    // Limpa o CNPJ para conter somente numeros, removendo traços e pontos
    cnpj = cnpj.replace(/\D/g, '');

    // Consulta o CNPJ na ReceitaWS com 60 segundos de tempo limite
    return jsonp('https://www.receitaws.com.br/v1/cnpj/' + encodeURI(cnpj), 60000)
        .then((json) => {
            if (json['status'] === 'ERROR') {
                $("#modal-cnpj").modal();
                var element = document.getElementById("tabs-icons-text-2-tab");
                var element2 = document.getElementById("tabs-icons-text-3-tab");
                element.classList.add("disabled");
                element2.classList.add("disabled");


                document.getElementById('name').value = ("");
                document.getElementById('email').value = ("");
                document.getElementById('razao_social').value = ("");
            } else {

                var element = document.getElementById("tabs-icons-text-2-tab");
                var element2 = document.getElementById("tabs-icons-text-3-tab");
                element.classList.remove("disabled");
                element2.classList.remove("disabled");

                document.getElementById('name').value = (json['fantasia']);
                document.getElementById('email').value = (json['email']);
                document.getElementById('razao_social').value = (json['nome']);

            }
        });
}
/**
 * Implementação da requisição em NodeJS
 */

const https = require('https');

function jsonp(url, timeout) {
    return new Promise(function (resolve, reject) {
        // Cria uma solicitação HTTP
        const req = https.get(url, (res) => {
            // Se o status não for 2XX, retorna um erro
            if (res.statusCode < 200 || res.statusCode >= 300) {
                return reject(res.statusMessage);
            }

            let data = '';
            res.on('data', chunk => { data += chunk; });
            res.once('end', () => { resolve(JSON.parse(data)); });
        });

        req.once('error', e => { reject(e.message); });
        req.setTimeout(timeout);
    });
}

/**
 * Implementação da requisição na web
 */

function jsonp(url, timeout) {
    // Gera um nome aleatório para a função de callback
    const func = 'jsonp_' + Math.random().toString(36).substr(2, 5);

    return new Promise(function (resolve, reject) {
        // Cria um script
        let script = document.createElement('script');

        // Cria um timer para controlar o tempo limite
        let timer = setTimeout(() => {
            reject('Tempo limite atingido');
            document.body.removeChild(script);
        }, timeout);

        // Cria a função de callback
        window[func] = (json) => {
            clearTimeout(timer);
            resolve(json);
            document.body.removeChild(script);
            delete window[func];
        };

        // Adiciona o script na página para inicializar a solicitação
        script.src = url + '?callback=' + encodeURI(func);
        document.body.appendChild(script);
    });
}
