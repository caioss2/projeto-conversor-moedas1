USE dbConversoes;

CREATE TABLE tbConversoes (
    id INT NOT NULL AUTO_INCREMENT,
    valor DECIMAL(10,2) NOT NULL,
    moeda_origem VARCHAR(5) NOT NULL,
    moeda_destino VARCHAR(5) NOT NULL,
    resultado DECIMAL(10,2) NOT NULL,
    PRIMARY KEY(id)
)
