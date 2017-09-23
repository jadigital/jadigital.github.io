// Destinatário
$para = "nader@jadigital.com.br";
 
// Assunto do e-mail
$assunto = "Contato Site";
 
// Campos do formulário de contato
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['tel'];
$mensagem = $_POST['conteudo'];
 
// Monta o corpo da mensagem com os campos
$corpo = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"pt-BR\" lang=\"pt-BR\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
    <style TYPE='text/css'>
        A {text-decoration: none} 
        A:link {color:'#89211b';} 
        A:visited {color:'#89211b';}
        A:hover {color:'#000000';} 
    </style>
</head><body>";
$corpo .= "Nome: $nome <br>";
$corpo .= "Email: $email <br>Telefone: $telefone <br>Mensagem: $mensagem";
$corpo .= "</body></html>";
 
// Cabeçalho do e-mail
$email_headers = implode("\n", array("From: $nome", "Reply-To: $email", "Subject: $assunto", "Return-Path: $email", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text / html;
charset = UTF-8"));
 
//Verifica se os campos estão preenchidos para enviar então o email
if (!empty($nome) && !empty($email) && !empty($mensagem)) {
    mail($para, $assunto, $corpo, $email_headers);
    $msg = "Sua mensagem foi enviada com sucesso.";
    echo "<script>alert('$msg');window.location.assign('http://www.jadigital.com.br/contato');</script>";
} else {
    $msg = "Erro ao enviar a mensagem.";
    echo "<script>alert('$msg');window.location.assign('http://www.jadigital.com.br/contato');</script>";
}
