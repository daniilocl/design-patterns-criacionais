/** Produto concreto criado quando a notificacao for por SMS. */
public class SmsNotificacao implements Notificacao {

    @Override
    public void enviar(String destinatario, String mensagem) {
        System.out.println("SMS enviado para " + destinatario + ": " + mensagem);
    }
}
