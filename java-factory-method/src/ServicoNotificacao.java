/**
 * Creator: possui a regra que usa um produto, mas delega sua criacao para
 * as subclasses por meio do Factory Method criarNotificacao().
 */
public abstract class ServicoNotificacao {

    /**
     * Este e o Factory Method. Cada subclasse decide qual Notificacao criar.
     */
    protected abstract Notificacao criarNotificacao();

    /**
     * Regra de negocio comum a todos os servicos.
     * Ela nao sabe (nem precisa saber) qual produto concreto sera usado.
     */
    public void notificar(String destinatario, String mensagem) {
        Notificacao notificacao = criarNotificacao();
        notificacao.enviar(destinatario, mensagem);
    }
}
