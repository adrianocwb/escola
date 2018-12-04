<html>
    <head>
        <meta charset="UTF-8>"
              <title> </title>

    </head>
    <body>
        <h1> Alunos Matriculados</h1>
        <link href="site.css" rel="stylesheet" type="text/css"/>
        <form action="insere.php"  method="post">
            <fieldset>
                <label>Nome</label>
                <input type="text" name= "nome" />
                <br>

                <label>Email</label>
                <input type="email" name= "email" />
                <br>

                <label>Turma</label>
                <select name="turma">
                    <option value="PHP1" >PHP</option> 
                    <option value="PHP2" >PHP2</option>
                    <option value="Mysql">Mysql</option>
                    <option value="AJAX" >AJAX</option>
                    <option value="HTML" >HTML</option>

                </select>
                <br>

                <label>Data de nascimento</label>
                <input type="date" name= "data" >
                <br>

                <button type="submit" >Cadastrar </button>

            </fieldset>

        </form>

        <table>
            <tr>
                <th><a href="?coluna=nome">Nome</a></th>
                <th><a href="?coluna=email">Email</a></th>
                <th><a href="?coluna=turma">Turma</a></th>
                <th><a href="?coluna=data">Data de Aniversário</a></th>
            </tr>
            <?php
            require "bd.php";

            /* if (isset($_GET["coluna"]) == false) {
              $coluna = "nome";
              } else {
              $coluna = $_GET["coluna"];
              } */
            //if ternario
            $coluna = (isset($_GET["coluna"]) == false) ? "nome" : $_GET["coluna"];

            $con = dbcon();
            //var_dump ($con);

            $sql = "SELECT * FROM alunos ORDER BY $coluna ASC";
            $res = mysqli_query($con, $sql);

            $alunos = mysqli_fetch_all($res, MYSQLI_ASSOC);
            //var_dump($alunos)

            foreach ($alunos as $aluno) {
                $date_orl = $aluno["data"];
                $nova = explode ("-", $date_orl);
                $time = mktime(0,0,0, $nova[1], $nova[2], $nova[0]);
                $date = date('d/M/Y', $time);
                        
                echo"   <tr>";
                echo"        <td>" . $aluno["nome"] . "</td>";
                echo"        <td>" . $aluno["email"] . "</td>";
                echo"        <td>" . $aluno["turma"] . "</td>";
                echo"        <td>" . $date . "</td>";
                echo"    </tr>";
            }
            ?>        


        </table>






    </body>

</html>
