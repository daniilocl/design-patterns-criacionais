public class Main {
    public static void main(String[] args) {
        // O cliente trabalha com o tipo abstrato, nao com classes concretas.
        ServicoNotificacao servicoEmail = new ServicoEmail();
        servicoEmail.notificar(
                "danilo@exemplo.com",
                "Seu cadastro foi realizado com sucesso."
        );

        ServicoNotificacao servicoSms = new ServicoSms();
        servicoSms.notificar(
                "+55 11 99999-9999",
                "Seu codigo de confirmacao e 123456."
        );
    }
}
