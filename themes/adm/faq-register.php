<?php
  $this->layout("_theme");
  echo "Olá, Registro de FAQ! <br>";
?>

<form id="faq-register" action="">
    <div>
        Pergunta: <input type="text" name="question">
    </div>
    <div>
        Resposta: <input type="text" name="answer">
    </div>
    <div>
        <button>Salvar</button>
    </div>
</form>

<div id="message">
</div>

<script type="text/javascript" async>
    const form = document.querySelector("#faq-register");
    const message = document.querySelector("#message");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataFAQ = new FormData(form);
        const data = await fetch("<?= url("admin/faq-registro") ?>",{
            method : "POST",
            body : dataFAQ
        });
        const faq = await data.json();
        console.log(faq);
        if(faq.type){
            message.textContent = faq.message;
        }
    })
</script>

