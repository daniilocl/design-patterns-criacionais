/**
 * Produto: representa qualquer forma de notificar um usuario.
 *
 * O restante do programa conhece apenas este contrato, sem depender de
 * EmailNotificacao ou SmsNotificacao diretamente.
 */
public interface Notificacao {
    void enviar(String destinatario, String mensagem);
}
