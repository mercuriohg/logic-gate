<?php

require_once __DIR__ . '/../config/Database.php';

class UserModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // Cadastrar usuário
    public function create(
        string $nome,
        string $email,
        string $senha
    ): bool {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario
                (nome_usuario, email, senha_hash)
                VALUES (:nome, :email, :senha_hash)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha_hash' => $senhaHash
        ]);
    }

    // Buscar usuário pelo ID
    public function getById(int $id): array|false
    {
        $sql = "SELECT id, nome_usuario, email, xp_total, nivel
                FROM usuario
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Buscar usuário pelo e-mail
    public function getByEmail(string $email): array|false
    {
        $sql = "SELECT *
                FROM usuario
                WHERE email = :email";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Verificar login
    public function authenticate(
        string $email,
        string $senha
    ): array|false {
        $usuario = $this->getByEmail($email);

        if (
            !$usuario ||
            !password_verify($senha, $usuario['senha_hash'])
        ) {
            return false;
        }

        unset($usuario['senha_hash']);

        return $usuario;
    }

    // Atualizar nome e e-mail
    public function update(
        int $id,
        string $nome,
        string $email
    ): bool {
        $sql = "UPDATE usuario
                SET nome_usuario = :nome,
                    email = :email
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':email' => $email
        ]);
    }

    // Alterar senha
    public function updatePassword(
        int $id,
        string $novaSenha
    ): bool {
        $senhaHash = password_hash(
            $novaSenha,
            PASSWORD_DEFAULT
        );

        $sql = "UPDATE usuario
                SET senha_hash = :senha_hash
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':senha_hash' => $senhaHash
        ]);
    }

    // Excluir usuário
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM usuario WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}