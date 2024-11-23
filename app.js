function iniciar() {
  listarCidade();
}

async function listarCidade() {
  var url = "./php/cidade_listar.php";
  var resp = await fetch(url).then((resp) => {
    return resp.json();
  });
  console.log(resp);

  var tabela = document.getElementById("tabelaCidade");
  var a = "";
  for (var i = 0; i < resp.length; i++) {
    a =
      a +
      `<tr>
            <td>${resp[i].cod_cidade}</td>
            <td>${resp[i].cidade}</td>
            <td>${resp[i].uf}</td>
            <td>
              <button
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#modalCidade"
                onclick="abrirCidade(${resp[i].cod_cidade})"
              >
                Alterar
              </button>
            </td>
            <td>
              <button class="btn btn-danger">Excluir</button>
            </td>
          </tr>`;
  }
  tabela.innerHTML = a;
}

async function abrirCidade(cod_cidade) {
  var inputcod_cidade = document.getElementById(`cod_cidade`);
  var inputcidade = document.getElementById(`cidade`);
  var inputuf = document.getElementById(`uf`);

  if (cod_cidade == 0) {
    document.getElementById(`tituloCidade`).innerHTML = `Inserindo nova cidade`;

    inputcod_cidade.value = "";
    inputcidade.value = "";
    inputuf.value = "";
  } else {
    document.getElementById(`tituloCidade`).innerHTML = `Alterar Cidade`;

    var url = `./php/cidade_selecionar.php?cod_cidade=${cod_cidade}`;
    var resp = await fetch(url).then((resp) => {
      return resp.json();
    });
    console.log(resp);

    inputcod_cidade.value = resp[0].cod_cidade;
    inputcidade.value = resp[0].cidade;
    inputuf.value = resp[0].uf;
  }
}

async function salvarCidade() {
  var inputcod_cidade = document.getElementById(`cod_cidade`);
  var inputcidade = document.getElementById(`cidade`);
  var inputuf = document.getElementById(`uf`);
  var url = "";

  if (inputcod_cidade.value == "") {
    url = `./php/cidade_inserir.php?cidade=${inputcidade.value}&uf=${inputuf.value}`;
    await fetch(url).then((resp) => {
      return resp.json();
    });
  } else {
    url = `./php/cidade_alterar.php?cod_cidade=${inputcod_cidade.value}&cidade=${inputcidade.value}&uf=${inputuf.value}`;
    await fetch(url).then((resp) => {
      return resp.json();
    });
  }
  listarCidade();
}
