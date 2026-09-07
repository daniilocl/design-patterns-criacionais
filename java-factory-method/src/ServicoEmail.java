/** Creator concreto: escolhe criar uma notificacao por e-mail. */
public class ServicoEmail extends ServicoNotificacao {

    @Override
    protected Notificacao criarNotificacao() {
        return new EmailNotificacao();
    }
}
