/** Produto concreto criado quando a notificacao for por e-mail. */
public class EmailNotificacao implements Notificacao {

    @Override
    public void enviar(String destinatario, String mensagem) {
        System.out.println("E-mail enviado para " + destinatario + ": " + mensagem);
    }
}
