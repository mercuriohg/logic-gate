<?php

declare(strict_types=1);

final class PhaseModel
{
    public function __construct(private PDO $pdo)
    {
    }

    /** Lista as fases em ordem de jogo. */
    public function getAll(): array
    {
        $sql = '
            SELECT f.id, f.nome, f.ordem, f.dificuldade, f.enunciado,
                   f.objetivo, f.xp_recompensa, f.pontos_recompensa, f.admin_id
            FROM fase f
            ORDER BY f.ordem ASC
        ';

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Busca uma fase com suas portas lógicas associadas. */
    public function getById(int $id): ?array
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, nome, ordem, dificuldade, enunciado, objetivo,
                    xp_recompensa, pontos_recompensa, admin_id
             FROM fase
             WHERE id = :id
             LIMIT 1'
        );
        $stmt->execute(['id' => $id]);
        $phase = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$phase) {
            return null;
        }

        $doorsStmt = $this->pdo->prepare(
            'SELECT pl.id, pl.nome, pl.descricao, pl.tabela_verdade,
                    fp.quantidade_disponivel
             FROM fase_porta fp
             INNER JOIN porta_logica pl ON pl.id = fp.porta_id
             WHERE fp.fase_id = :fase_id
             ORDER BY pl.id ASC'
        );
        $doorsStmt->execute(['fase_id' => $id]);
        $phase['portas'] = $doorsStmt->fetchAll(PDO::FETCH_ASSOC);

        return $phase;
    }

    /** Retorna as fases que estão marcadas como desbloqueadas para o usuário. */
    public function getUnlockedPhases(int $usuarioId): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT f.id, f.nome, f.ordem, f.dificuldade, f.enunciado,
                    f.objetivo, f.xp_recompensa, f.pontos_recompensa,
                    p.desbloqueada, p.concluida
             FROM progresso p
             INNER JOIN fase f ON f.id = p.fase_id
             WHERE p.usuario_id = :usuario_id
               AND p.desbloqueada = 1
             ORDER BY f.ordem ASC'
        );
        $stmt->execute(['usuario_id' => $usuarioId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Cria uma fase e retorna o ID gerado. */
    public function create(array $data): int
    {
        $this->validateData($data);

        $stmt = $this->pdo->prepare(
            'INSERT INTO fase
                (nome, ordem, dificuldade, enunciado, objetivo,
                 xp_recompensa, pontos_recompensa, admin_id)
             VALUES
                (:nome, :ordem, :dificuldade, :enunciado, :objetivo,
                 :xp_recompensa, :pontos_recompensa, :admin_id)'
        );

        $stmt->execute([
            'nome' => trim($data['nome']),
            'ordem' => (int) $data['ordem'],
            'dificuldade' => $data['dificuldade'],
            'enunciado' => trim($data['enunciado']),
            'objetivo' => (int) $data['objetivo'],
            'xp_recompensa' => (int) ($data['xp_recompensa'] ?? 0),
            'pontos_recompensa' => (int) ($data['pontos_recompensa'] ?? 0),
            'admin_id' => (int) $data['admin_id'],
        ]);
    }
}