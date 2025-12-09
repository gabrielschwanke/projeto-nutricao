# 🥗 Calculadora Nutricional --- Macronutrientes & Dicas Alimentares

Um sistema completo desenvolvido em **PHP + MySQL** para calcular a
quantidade ideal de **macronutrientes** (proteínas, carboidratos e
gorduras) de acordo com o objetivo do usuário: **perder peso, manter o
peso ou ganhar massa muscular**.

Além disso, o sistema apresenta **orientações personalizadas**, gráficos
de desempenho, animações modernas e páginas informativas para auxiliar o
usuário durante sua evolução nutricional.

------------------------------------------------------------------------

## 🚀 Funcionalidades Principais

-   🔐 **Autenticação**
    -   Login, cadastro, logout e proteção de rotas.
-   ⚖️ **Cálculo nutricional personalizado**
    -   Usa dados como idade, peso, altura, sexo e objetivo.
    -   Calcula calorias diárias.
    -   Gera proporção de macronutrientes (carboidratos, proteínas e
        gorduras).
    -   Exibe tabela detalhada para cada objetivo.
-   📊 **Página de desempenho**
    -   Gráficos que exibem evolução e registros do usuário.
    -   Visualização dinâmica com Chart.js.
-   🧭 **Páginas informativas**
    -   Sobre\
    -   Funcionalidades\
    -   Contato\
    -   Suporte\
    -   Planos
-   🎨 **Interface moderna**
    -   Totalmente responsiva
    -   Componentes animados
    -   Campos customizados e UI refinada

------------------------------------------------------------------------

## 🛠️ Tecnologias Utilizadas

-   **PHP 7+**
-   **MySQL**
-   **HTML5 / CSS3**
-   **JavaScript**
-   **Chart.js**
-   **Custom CSS Animations**

------------------------------------------------------------------------

## 📷 Capturas de Tela (opcional)

Adicione imagens reais do projeto na pasta `/imagens` e substitua os
caminhos abaixo:

    ![Tela Inicial](imagens/tela-inicial.png)
    ![Dashboard](imagens/dashboard.png)
    ![Cálculo de Macronutrientes](imagens/calculo-macro.png)

------------------------------------------------------------------------

## 📦 Como instalar e rodar localmente (XAMPP)

### 🔧 Pré-requisitos

-   XAMPP instalado (Apache + MySQL)\
-   Navegador atualizado\
-   Git (opcional)

------------------------------------------------------------------------

### **1️⃣ Clone o repositório**

``` bash
git clone https://github.com/gabrielschwanke/projeto-nutricao.git
```

Ou baixe o ZIP no GitHub.

------------------------------------------------------------------------

### **2️⃣ Mover para o diretório do servidor local**

#### Windows:

    C:\\xampp\\htdocs\\calculadora-nutricional

#### macOS / Linux:

    /opt/lampp/htdocs/calculadora-nutricional

------------------------------------------------------------------------

### **3️⃣ Inicie o servidor**

Abra o painel do XAMPP e ative:

✔ Apache\
✔ MySQL

------------------------------------------------------------------------

### **4️⃣ Criar o banco de dados**

1.  Acesse: http://localhost/phpmyadmin\
2.  Clique em **Novo**\
3.  Crie o banco de dados com o nome:

```{=html}
<!-- -->
```
    calculadora_nutricional

4.  Vá em **Importar**\
5.  Selecione o arquivo:

```{=html}
<!-- -->
```
    database.sql

6.  Clique em **Executar**

------------------------------------------------------------------------

### **5️⃣ Ajustar arquivo de conexão**

``` php
<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "calculadora_nutricional";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
```

------------------------------------------------------------------------

### **6️⃣ Acessar o sistema**

Abra no navegador:

    http://localhost/calculadora-nutricional/

------------------------------------------------------------------------

# ☁️ Deploy em Servidor (InfinityFree ou outro)

Se você quiser hospedar seu sistema online, siga estes passos:

------------------------------------------------------------------------

### **1️⃣ Criar conta no InfinityFree**

https://www.infinityfree.com/

Crie seu domínio gratuito ou subdomínio fornecido pela plataforma.

------------------------------------------------------------------------

### **2️⃣ Enviar arquivos via Gerenciador de Arquivos ou FTP**

Coloque todos os arquivos dentro da pasta:

    /htdocs

------------------------------------------------------------------------

### **3️⃣ Criar o banco de dados no painel**

1.  Acesse o painel do InfinityFree\
2.  Vá em **MySQL Databases**\
3.  Crie um novo banco\
4.  Anote:
    -   DB Name\
    -   DB User\
    -   DB Password\
    -   Hostname (geralmente algo como `sqlXXX.epizy.com`)

------------------------------------------------------------------------

### **4️⃣ Importar o database.sql**

1.  Acesse o **phpMyAdmin do InfinityFree**\
2.  Clique no banco criado\
3.  Vá em **Importar**\
4.  Selecione `database.sql`\
5.  Execute

------------------------------------------------------------------------

### **5️⃣ Configurar `conexao.php` com as credenciais do host**

``` php
<?php
$host = "sql305.epizy.com";   // Host do InfinityFree
$usuario = "epiz_123456789";  // Usuário do banco
$senha = "SENHADOBANCO";      // Senha do banco
$banco = "epiz_123456789_calc"; // Nome do banco

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
```

------------------------------------------------------------------------

### **6️⃣ Acessar seu sistema no navegador**

Exemplo:

    https://seuprojeto.infinityfreeapp.com

------------------------------------------------------------------------

# 👤 Autor

**Gabriel Pereira Schwanke**\
Projeto acadêmico desenvolvido para o curso de **Análise e
Desenvolvimento de Sistemas**.
