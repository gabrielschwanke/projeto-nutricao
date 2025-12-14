-- =======================================================
-- BANCO DE DADOS: dieta_db
-- =======================================================
-- =======================================================
-- TABELA: usuarios
-- =======================================================
-- Armazena as informações de login e contato dos usuários.
-- =======================================================
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =======================================================
-- TABELA: desempenho
-- =======================================================
-- Armazena o histórico de desempenho (ex: peso) de cada usuário.
-- Cada registro pertence a um usuário em "usuarios".
-- =======================================================
CREATE TABLE IF NOT EXISTS desempenho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    peso DECIMAL(5,2) NOT NULL,
    data_registro DATE NOT NULL DEFAULT (CURRENT_DATE),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- =======================================================
-- INSERÇÃO DE DADOS DE EXEMPLO (opcional)
-- =======================================================
-- Descomente as linhas abaixo se quiser inserir dados de teste.

-- INSERT INTO usuarios (nome, email, senha, telefone)
-- VALUES ('João Silva', 'joao@email.com', '123456', '11999999999');

-- INSERT INTO desempenho (usuario_id, peso, data_registro)
-- VALUES
-- (1, 78.5, '2025-10-01'),
-- (1, 77.9, '2025-10-10'),
-- (1, 77.4, '2025-10-20'),
-- (1, 76.8, '2025-10-30');
