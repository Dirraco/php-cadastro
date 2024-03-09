--usuario_loja

CREATE TABLE usuario_dados (
  id_usuario_dados INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_usuario VARCHAR(255) NULL,
  email_usuario VARCHAR(255) NULL,
  celular_usuario VARCHAR(255) NULL,
  senha_usuario VARCHAR(255) NULL,
  genero_usuario VARCHAR(255) NULL,
  cargo_usuario VARCHAR(255) NULL,
  salario_usuario DECIMAL(10,2) NULL,
  PRIMARY KEY(id_usuario_dados)
);


