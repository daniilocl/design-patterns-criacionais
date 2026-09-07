/** Creator concreto: escolhe criar uma notificacao por SMS. */
public class ServicoSms extends ServicoNotificacao {

    @Override
    protected Notificacao criarNotificacao() {
        return new SmsNotificacao();
    }
}
