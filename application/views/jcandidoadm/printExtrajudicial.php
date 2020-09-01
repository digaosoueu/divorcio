<script>print();</script>

    <h3>1° Requerente (Cônjuge)</h3>
    <p>Nome Completo: <?php echo $form["nome_conjuge1"]; ?></p>
    <p>Endereço: <?php echo $form["endereco_conjuge1"]; ?></p>
    <p>RG: <?php echo $form["rg_conjuge1"]; ?></p>
    <p>CPF: <?php echo $form["cpf_conjuge1"]; ?></p>
    <p>Número: <?php echo $form["numero_conjuge1"]; ?></p>
    <p>Bairro: <?php echo $form["bairro_conjuge1"]; ?></p>
    <p>Cidade: <?php echo $form["cidade_conjuge1"]; ?></p>
    <p>Complemento: <?php echo $form["compl_conjuge1"]; ?></p>
    <p>Profissão: <?php echo $form["profissao_conjuge1"]; ?></p>
    <p>Estado: <?php echo $form["estado_conjuge1"];?></p> 
    <p>CEP: <?php echo $form["cep_conjuge1"]; ?></p>
    <p>Nome de solteiro: <?php echo $form["nome_solteiro_conjuge1"]; ?></p>
    
    <h3>2° Requerente (Cônjuge)</h3>
    <p>Nome Completo: <?php echo $form["nome_conjuge2"]; ?></p>
    <p>Endereço: <?php echo $form["endereco_conjuge2"]; ?></p>
    <p>RG: <?php echo $form["rg_conjuge2"]; ?></p>
    <p>CPF: <?php echo $form["cpf_conjuge2"]; ?></p>
    <p>Número: <?php echo $form["numero_conjuge2"]; ?></p>
    <p>Bairro: <?php echo $form["bairro_conjuge2"]; ?></p>
    <p>Cidade: <?php echo $form["cidade_conjuge2"]; ?></p>
    <p>Complemento: <?php echo $form["compl_conjuge2"]; ?></p>
    <p>Profissão: <?php echo $form["profissao_conjuge2"]; ?></p>
    <p>Estado: <?php echo $form["estado_conjuge2"];?></p>
    <p>CEP: <?php echo $form["cep_conjuge2"]; ?></p>
    <p>Nome de solteiro: <?php echo $form["nome_solteiro_conjuge2"]; ?></p>			
    
    <h3>Informações Comuns sobre os Cônjuges</h3>
    
    <p>Data de Casamento: <?php echo date("d", strtotime($form["data_casamento"])); ?>/<?php echo date("m", strtotime($form["data_casamento"])); ?>/<?php echo date("Y", strtotime($form["data_casamento"])); ?></p>
    
    <p>Foi feito pacto antenupcial? Se sim, descrever o que foi contratado:<br />
    <?php echo $form["pacto_antenupcial"]; ?></p>
    
    <p>Há bens a dividir? Se sim, descrever quais bens, valores médios de mercado e localização dos imóveis:<br />
    <?php echo $form["bens_dividir"]; ?></p>
    
    <p>Descrever como foi tratada consensualmente a partilha dos bens:<br />
    <?php echo $form["partilha_bens"]; ?></p>
    
    <p>Descrever o valor da pensão alimentícia (caso o casal deseje estipular):<br />
    <?php echo $form["pensao_alimenticia"]; ?></p>
    
    <p>Descrever o valor de contribuição para criar e educar os filhos menores ou maiores (caso o casal deseja estipular):<br />
    <?php echo $form["contribuicao_educacao"]; ?></p>
    
    <p>Descrever o valor de eventuais impostos ou dívidas devidas em decorrência dos conviventes ou da partilha de bens:<br />
    <?php echo $form["impostos_dividas"]; ?></p>
