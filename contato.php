
<div class="container" id="contato">

            <div class="row text-center">
                <div class="col-lg-6">
                    <h2>Ficou interessado?<br /> Contate para um orçamento</h2>
                    <br />
                    <form method="POST">
                    <div class="form-group col-md-6">
                        <input class="form-control" type="text" placeholder="Nome" name="nome">
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" type="tel" placeholder="Telefone" name="telefone">
                    </div>
                    <div class="form-group col-md-12">
                        <input class="form-control" type="email" placeholder="Email" name="email">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea class="form-control" rows="3" placeholder="Digite a sua mensagem" name="mensagem"></textarea>
                    </div>


                    <br />
                    <input type="submit" class="btn btn-success btn-lg"></input>
                </form>
                </div>
                <div class="col-lg-6">
                	
                    <ul class="list-inline banner-social-buttons col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1">
                    	<h2 style="margin-bottom: 40px;">Ou se preferir:</h2>
                        <li>
                            <a href="https://www.facebook.com/rubens.gomes.7" class="btn btn-info btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                        <h3>(11)99866-4097</h3>
                        <h3>Guarulhos-SP</h3>
                    </ul>


                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->
	
		

<?php 
	@$nome = $_POST["nome"];
	@$telefone = $_POST["telefone"];
	@$email = $_POST["email"];
	@$mensagem = $_POST["mensagem"];
	if($nome != null  and $email != null and $mensagem != null){

	require_once("PHPMailer-master/PHPMailerAutoload.php"); 


	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp-mail.outlook.com'; //host da outlook
	$mail->Port = 587; //25 ou 587
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;

	// REMOVER A CONDIÇÃO DE BAIXO PRA VER SE RODA
	$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
	// REMOVER A CONDIÇÃO DE CIMA PRA VER SE RODA
	
	$mail->Username = "rubensgagostinho@outlook.com"; 
	$mail->Password = "rg64567203";


	// quem vai enviar
	$mail->setFrom("rubensgagostinho@outlook.com", "Mensagem do adm");
	// quem vai receber
	$mail->addAddress("rubensgagostinho@outlook.com");
	$mail->Subject = "Contato ADM";
	$mail->msgHTML("<html>De: {$nome}<br/>Telefone: {$telefone}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
	$mail->AltBody = "De: {$nome}\nTelefone: {$telefone}\nEmail:{$email}\nmensagem: {$mensagem}";

	if($mail->send()){
		echo '<script>alert("Mensagem enviada com sucesso, logo entraremos em contato, obrigado!")</script>';
		$nome = null;
		$telefone = null;
		$email = null;
		$mensagem = null;
	} else {
		echo '<script>alert("Não foi possivel enviar a sua mensagem")</script>';
		$nome = null;
		$telefone = null;
		$email = null;
		$mensagem = null;
	}
	die();

}
?>