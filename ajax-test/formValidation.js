$(document).ready(function () {
    $("#meuForm").on("submit", function (e) {
      e.preventDefault();
  
      // Simples validação
      let nome = $("#nome").val().trim();
      let email = $("#email").val().trim();
  
      if (!nome || !email) {
        Swal.fire({
          icon: "error",
          title: "Erro",
          text: "Por favor, preencha todos os campos.",
        });
        return;
      }
  
      // Enviar via Ajax (simulando, pois não temos backend real)
      $.ajax({
        url: "https://jsonplaceholder.typicode.com/posts", // API fake para teste
        method: "POST",
        data: { nome, email },
        success: function (response) {
          Swal.fire({
            icon: "success",
            title: "Sucesso",
            text: "Dados enviados com sucesso!",
          });
  
          // Limpar formulário
          $("#meuForm")[0].reset();
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Erro",
            text: "Falha ao enviar os dados.",
          });
        },
      });
    });
  
    // Botão para mostrar a tabela com SweetAlert e DataTable
    $("#mostrarTabela").on("click", function () {
      // Dados para a tabela (você pode buscar via Ajax também)
      const data = [
        ["1", "João", "joao@email.com"],
        ["2", "Maria", "maria@email.com"],
        ["3", "Pedro", "pedro@email.com"],
      ];
  
      // Criar o HTML da tabela
      let tabelaHTML = `
        <table id="minhaTabela" class="display" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            ${data
              .map(
                (row) =>
                  `<tr><td>${row[0]}</td><td>${row[1]}</td><td>${row[2]}</td></tr>`
              )
              .join("")}
          </tbody>
        </table>
      `;
  
      Swal.fire({
        icon: "info",   
        title: "Minha Tabela",
        html: tabelaHTML,
        width: "600px",
        didOpen: () => {
          // Inicializar DataTable após o SweetAlert abrir
          $("#minhaTabela").DataTable();
        },
        showCloseButton: true,
        showConfirmButton: false,
      });
    });
  });
  